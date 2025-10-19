<?php 

use dclass\devups\Datatable\Lazyloading;

class LabsreservationFrontController extends LabsreservationController{

    public function ll($next = 1, $per_page = 10){
        
            $ll = new Lazyloading();
            $ll->lazyloading(new Labsreservation());
            return $ll;

    }

    public function createAction($labsreservation_form = null ){
        $rawdata = \Request::raw();
        $labsreservation = $this->hydrateWithJson(new Labsreservation(), $rawdata["labsreservation"]);
 

        
        $id = $labsreservation->__insert();
        return 	array(	'success' => true,
                        'labsreservation' => $labsreservation,
                        'detail' => '');

    }

    public function updateAction($id, $labsreservation_form = null){
        $rawdata = \Request::raw();
            
        $labsreservation = $this->hydrateWithJson(new Labsreservation($id), $rawdata["labsreservation"]);

                  
        
        $labsreservation->__update();
        return 	array(	'success' => true,
                        'labsreservation' => $labsreservation,
                        'detail' => '');
                        
    }
    

    public function detailAction($id)
    {

        $labsreservation = Labsreservation::find($id);

        return 	array(	'success' => true,
                        'labsreservation' => $labsreservation,
                        'detail' => '');

    }   

    public function deleteLabsreservation(){
        $id = $_POST['id'];
        $Labsreservation = Labsreservation::where('this.id',$id)->delete();
        return 	array(	'success' => true,
            'detail' => 'ok');
    }    

    public function sheduleLabs(){
        
        if(!empty($_POST["startDate"]) && !empty($_POST["endDate"]) && !empty($_POST["lab"])&& !empty($_POST["user"])&& !empty($_POST["fuseau"])&& !is_null($_POST["fuseau"]) && $_POST["fuseau"] !== 'null')
        {
            $labs = Labs::find($_POST["lab"]);
            $user = User::find($_POST["user"]);
            $lab = Labs_labs_keys::where('labs_id',$_POST["lab"])->get();
            $start = new DateTime($_POST["startDate"]);
            $end = new DateTime($_POST["endDate"]);
            $today = date('Y-m-d H:i:s');
            $today = new DateTime(gmdate("Y-m-d H:i:s"));

            $fuseau = $_POST['fuseau'];


            $userstart = new DateTime($_POST["startDate"]);
            $userend = new DateTime($_POST["endDate"]);

            if (str_contains($fuseau, '+')) {
                $fuseau_up = str_replace("+","-",$fuseau);
            }
            else{
                $fuseau_up = str_replace("-","+",$fuseau);
            }

            $hour_fuseau = explode (":", $fuseau_up)[0];

            $start->modify($hour_fuseau.' hours');
            $end->modify($hour_fuseau.' hours');

            //var_dump($start);
            //exit();

//            var_dump($today);
//            var_dump($end);
//            var_dump($start);

            if(($end > $start)&&($end > $today)){
                $diff    = $end->diff($start);  
                $hours = $diff->h;
                $hours = $hours + ($diff->days*24);

                $tokens = $hours*$labs->getToken();
                $usertoken = $user->getToken();

                if($usertoken >= $tokens){
                    $keys;
                    $available = false;
                    $i=0;
                    
                    while($i<count($lab) && !$available ){
                        $l = $lab[$i];
                        $available = true;
                        
                        $labsreservations = Labsreservation::where(['labs_id'=>$_POST["lab"],'statut'=>0, 'labs_keys_id'=>$l->getLabs_keys()->getID()])
                                            ->get();
                        
                                            //var_dump($labsreservations);
                        foreach($labsreservations as $c=>$labsreservation){
                            //var_dump($labsreservation);
                            $d1 = new DateTime($labsreservation->getDate());

                            $d2 = new DateTime($labsreservation->getDatefin());
                            if((($d1 <= $start)&&($d2 >= $start))||(($d1 <= $end)&&($d2 >= $end))||(($start <= $d1)&&($end >= $d1))||(($start <= $d2)&&($end >= $d2))){
                                $available = false;
                            }
                            
                        }
                        
                        if($available){
                            $keys = $l->getLabs_keys();
                            
                        }
                        $i++;
                        
                    }

                    if($available){
                        $labsres = new Labsreservation();
                        $labsres->setDate($start->format('Y-m-d H:i'));
                        $labsres->setDatefin($end->format('Y-m-d H:i'));

                        $labsres->setUserdatestart($userstart->format('Y-m-d H:i'));
                        $labsres->setUserdatefin($userend->format('Y-m-d H:i'));
                        $labsres->setFuseau($fuseau);

                        $labsres->setStatut(0);
                        $labsres->setLabs($labs);
                        $labsres->setLabs_keys($keys);
                        $labsres->setUser($user);
                        $id = $labsres->__insert();

                        
                        $user->setToken($usertoken - $tokens);
                        $user->__update();
                        return [
                            "success" => true,
                            "detail" => "ok",
                            "redirect" => "alllabs",
                            "data" => $keys
                        ];
                    }
                    else{
                        return [
                            "success" => true,
                            "detail" => "ko",
                        ];
                    }
                }
                else{
                    return [
                        "success" => false,
                        "error" => "Vous n'avez pas assez de token"
                    ];
                }
            }
            else{
                return [
                    "success" => false,
                    "error" => "Incohérence entre les dates"
                ];
            }

            
        }
        else{
            return [
                "success" => false,
                "error" => "Tous les champs sont obligatoires"
            ];
        }
    }

    /*public function sheduleLabs(){
        if(!empty($_POST["startDate"]) && !empty($_POST["endDate"]) && !empty($_POST["lab"])&& !empty($_POST["user"]))
        {
            $labs = Labs::find($_POST["lab"]);
            $user = User::find($_POST["user"]);
            $lab = Labs_labs_keys::where('labs_id',$_POST["lab"])->get();
            $start = new DateTime($_POST["startDate"]);
            $end = new DateTime($_POST["endDate"]);
            $today = date('Y-m-d');
            $today = new DateTime($today);
            
            if(($end > $start)&&($start >= $today)){
                $diff    = $end->diff($start);  
                $hours = $diff->h;
                $hours = $hours + ($diff->days*24);

                $tokens = $hours*$labs->getToken();
                $usertoken = $user->getToken();

                if($usertoken >= $tokens){
                    $keys;
                    $available = false;
                    $i=0;
                    
                    while($i<count($lab) && !$available ){
                        $l = $lab[$i];
                        $available = true;
                        
                        $labsreservations = Labsreservation::where(['labs_id'=>$_POST["lab"],'statut'=>0, 'labs_keys_id'=>$l->getLabs_keys()->getID()])
                                            ->get();
                        
                                            //var_dump($labsreservations);
                        foreach($labsreservations as $c=>$labsreservation){
                            //var_dump($labsreservation);
                            $d1 = new DateTime($labsreservation->getDate());

                            $d2 = new DateTime($labsreservation->getDatefin());
                            if((($d1 <= $start)&&($d2 >= $start))||(($d1 <= $end)&&($d2 >= $end))||(($start <= $d1)&&($end >= $d1))||(($start <= $d2)&&($end >= $d2))){
                                $available = false;
                            }
                            
                        }
                        
                        if($available){
                            $keys = $l->getLabs_keys();
                            
                        }
                        $i++;
                        
                    }

                    if($available){
                        $labsres = new Labsreservation();
                        $labsres->setDate($_POST["startDate"]);
                        $labsres->setDatefin($_POST["endDate"]);
                        $labsres->setStatut(0);
                        $labsres->setLabs($labs);
                        $labsres->setLabs_keys($keys);
                        $labsres->setUser($user);
                        $id = $labsres->__insert();

                        
                        $user->setToken($usertoken - $tokens);
                        $user->__update();
                        return [
                            "success" => true,
                            "detail" => "ok",
                            "redirect" => "alllabs",
                            "data" => $keys
                        ];
                    }
                    else{
                        return [
                            "success" => true,
                            "detail" => "ko",
                        ];
                    }
                }
                else{
                    return [
                        "success" => false,
                        "error" => "Vous n'avez pas assez de token"
                    ];
                }
            }
            else{
                return [
                    "success" => false,
                    "error" => "format de date incorrect"
                ];
            }

            
        }
        else{
            return [
                "success" => false,
                "error" => "les champs ne doivent pas etre vide"
            ];
        }
    }*/

}
