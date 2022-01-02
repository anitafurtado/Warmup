export {Model};
const Model = {
    data: {
        warmups: []
    },
    load:function(){
        fetch('data.json')
        .then(
            function(response){
                return response.json();
            }
        )
        .then(
            function(data){
                for(let i =0; i<data.length;i++){
                    var d = new Date(data[i].date_published);
                    data[i].date_published=d.toUTCString();
                } 
                Model.data.warmups=data;
                let event = new CustomEvent("updated");
                window.dispatchEvent(event);

            }
        )
    }, 

    getWarmups: function(){
        return this.data.warmups;
    }
}