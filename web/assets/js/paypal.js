function purchase(value, currency, currency_code, product_name, quantity, locateId, functionafter =app.saveTokenBuy){
   
    paypal.Buttons({
        style: {
            layout:  'vertical',
            color:   'gold',

            label:   'buynow'
        },
    
        // Sets up the transaction when a payment button is clicked
        createOrder: function(data, actions) {
          return actions.order.create({
    
            purchase_units: [{
              amount: {
                  currency_code: currency_code,
                value: value,

              },
              
    
            }]
            
          });
          
        },
        
        // Finalize the transaction after payer approval
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {

            functionafter();

          });
        }
      }).render(locateId);
}