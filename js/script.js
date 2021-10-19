const app = new Vue({
    el: '#app',
    data: {
        url : window.location.href + '/../api/apiDischi.php',
        arrayDischi : [],
        arrayGeneri : [],
        genere : [],
        arrayFiltrato: []
    },
    mounted: function(){
        axios
        .get(this.url)
        .then(response => {
            this.arrayDischi = response.data;
            this.arrayFiltrato = response.data;
        })
        .catch(error => console.log(error))
        .finally(() => {
            this.arrayDischi.forEach(disco => {
                if(!this.arrayGeneri.includes(disco.genre)){
                    this.arrayGeneri.push(disco.genre);
                }
            });
        })
    },
    methods: {
        filterGenere(){
            if(this.genere){
                this.arrayFiltrato = [];
                this.arrayFiltrato = this.arrayDischi.filter((disco) => {
                    return disco.genre == this.genere;
                });
            }
            else {
                this.arrayFiltrato = this.arrayDischi;
            }
        }
    }

});