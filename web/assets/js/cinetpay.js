function checkout(url,price,devise,description,name,surname,email,phonenumber,country,countryname,functionafter =null) {
    devise = $('#devise').val();

    if(devise == 'CDF'){
        price = price*2159;
        price = parseInt(price);
    }
    else{
        if(devise == 'GNF'){
            price = price*9097;
            price = parseInt(price);
        }
        else{
            price = price*670;
            price = parseInt(price);
        }

    }


    if(country == ''){
        country = 'CM'
    }
    if(countryname == ''){
        countryname = 'CAM';
    }
    if(devise == ''){
        alert('Selectionnez  la devise')
    }
    else{

        CinetPay.setConfig({
            apikey: '1711984200634abe9e4e4df0.65807384',//   YOUR APIKEY
            site_id: '367845',//YOUR_SITE_ID
            notify_url: url,
            mode: 'SANDBOX'
        });
        CinetPay.getCheckout({
            transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
            amount: price,
            currency: devise,
            channels: 'ALL',
            description: description,
            //Fournir ces variables pour le paiements par carte bancaire
            customer_name:name,//Le nom du client
            customer_surname:surname,//Le prenom du client
            customer_email: email,//l'email du client
            customer_phone_number: phonenumber,//l'email du client
            customer_address : "",//addresse du client
            customer_city: countryname,// La ville du client
            customer_country : country,// le code ISO du pays
            customer_state : country,// le code ISO l'état
            customer_zip_code : "", // code postal

        });
        CinetPay.waitResponse(function(data) {
            if (data.status == "REFUSED") {
                if (alert("Votre paiement a échoué")) {
                    window.location.reload();
                }
            } else if (data.status == "ACCEPTED") {
                if(functionafter !== null){
                    functionafter();
                }
                else{
                    location.href = url;
                }
                
            }
        });
        CinetPay.onError(function(data) {
            console.log(data);
        });
    }

}