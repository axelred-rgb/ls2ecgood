//productCtrl

model._provide = function (id) {
    this._showmodal();

    $.get(this.baseurl+"?path="+this.entity+"._provide&id="+id, function (response) {
        databinding.checkrenderform(response);
    }, 'json').fail (function(resultat, statut, erreur){
        console.log(statut, resultat);
        databinding.bindmodal(resultat.responseText);
    });//, 'json'
};
