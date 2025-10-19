<?php
// user \dclass\devups\model\Model;

/**
 * @Entity @Table(name="notification")
 * */
class Notification extends Model implements JsonSerializable
{

    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     * */
    protected $id;
    /**
     * @Column(name="entity", type="string" , length=55 )
     * @var string
     **/
    protected $entity;
    /**
     * @Column(name="entityid", type="integer"  )
     * @var integer
     **/
    protected $entityid;

    /**
     * @Column(name="content", type="string" , length=255 , nullable=true)
     * @var string
     **/
    protected $content;

    /**
     * @ManyToOne(targetEntity="\Notificationtype")
     * @var \Notificationtype
     */
    public $notificationtype;

    public function __construct($id = null)
    {

        if ($id) {
            $this->id = $id;
        }

        $this->notificationtype = new Notificationtype();
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Notificationtype
     */
    public function getNotificationtype(): Notificationtype
    {
        return $this->notificationtype;
    }

    /**
     * @param Notificationtype $notificationtype
     */
    public function setNotificationtype(Notificationtype $notificationtype): void
    {
        $this->notificationtype = $notificationtype;
    }

    public function getEntity()
    {
        return $this->entity;
    }

    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    public function getEntityid()
    {
        return $this->entityid;
    }

    public function setEntityid($entityid)
    {
        $this->entityid = $entityid;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }


    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'entity' => $this->entity,
            'entityid' => $this->entityid,
            'content' => $this->content,
        ];
    }

    /**
     * @param $entity
     * @param $event
     * @param array $params
     * @return int|Notification
     */
    public static function on($entity, $event, $params = [])
    {

        $classname = strtolower(get_class($entity));
        $type = Notificationtype::where(["dvups_entity.name" => $classname, "_key" => $event])
            //->getSqlQuery();
            ->__firstOrNull();
        //die(var_dump($sql));
        if (is_null($type)) {
            $id = Notificationtype::create([
                "dvups_entity_id" => Dvups_entity::getbyattribut("this.name", $classname)->getId(),
                "_key" => $event,
                "content" => 'no content',
            ]);
            $type = Notificationtype::find($id);
        }
        $msg = $type->getContent();
        foreach ($params as $search => $value) {
            $msg = str_replace(":" . $search, $value, $msg);
        }

        $notification = new Notification();
        $notification->notificationtype = $type;
        $notification->setContent($msg);

        $notification->setEntity($classname);
        $notification->setEntityid($entity->getId());
        return $notification;
    }

    public function send($mb = [], $admin = false)
    {
        if (!$this->entityid)
            return $this;

        $this->__insert();
        if($admin)
            Notificationbroadcasted::sendAdmin($this, $mb);
        else
            Notificationbroadcasted::send($this, $mb);
        return $this;
    }

    public function sendSMS($destination)
    {
        if (!$this->entityid)
            return $this;

        if (!__prod)
            return 0;

        self::execSMS($destination, $this->getContent(), $this->notificationtype->get_key());
    }

    public static function execSMS($destination, $sms, $event = "")
    {

//Etape 4: precisez le numéro de téléphone (Format international)
        if (is_array($destination))
            $destination = implode(",", $destination);
        /*$destination = implode(",",
            array_map(function ($item) {
                return $item->getId();
            }, $destination));*/

        if (!$destination)
            return [
                'success' => false,
                'detail' => t("you most specify destination (s)"),
            ];

        $from = Configuration::get("sms_sender_id");
        $gateway_url = Configuration::get("sms_api");

        $access = Request::initCurl($gateway_url."auth?type=".Configuration::get("sms_refresh_token"))
            ->raw_data(
                [
                    "type"=> Configuration::get("sms_type"),
                    "username"=> Configuration::get("sms_username"),
                    "password"=> Configuration::get("sms_password"),
                    ]
            )
            ->send()
            ->json();

        if($access->status_code != 200) {
            Emaillog::create([
                "object" => "sms exception"." dest: ".$destination,
                "log" => $access->errors[0]->message,
            ]);
            return [
                "success"=>false,
                "detail" => $access->errors[0]->message,
            ];
        }

// Construire le corps de la requête
        $sms_body = array(
//            'action' => 'send-sms',
//            'api_key' => Configuration::get("sms_api_key"),
            "to" => ["$destination"],
            "from" => $from,
            "message" => $sms
        );

//        $send_data = http_build_query($sms_body);
//        $gateway_url = Configuration::get("sms_api") . "?" . $send_data;

        try {

            $output = Request::initCurl($gateway_url."sms/mt/v2/send")
                ->raw_data([$sms_body])
                ->addHeader('Authorization', "Bearer ".$access->payload->access_token)
                ->send();


            /*$curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => $gateway_url."sms/mt/v2/send",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => '[
	{
		 "to" : ["'.$destination.'"],
		 "from" : "'.$from.'",
		 "message" : "'.$sms.'"
	}
]',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$access->payload->access_token,
                    'Content-Type: application/json'
                ),
            ));

            $output = curl_exec($curl);

            curl_close($curl);

            Emaillog::create([
                "object" => "sms sent".$event." dest: ".$destination,
                "log" => $output->_response,
            ]);*/
            //var_dump($output);

        } catch (Exception $exception) {

            Emaillog::create([
                "object" => "sms exception"." dest: ".$destination,
                "log" => $exception->getMessage(),
            ]);
            //echo $exception->getMessage();
        }
    }

}
