const appPer = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appVaccine',
    data:{
        errors: [],
        view: true,
        buscador: '',
        listaVacunas: []
    },
    created: function () {
        // this.viewPeriod();
    },
    methods: {
        searchDni(){
            this.view = false
        },

        back(){
            this.view = true
        },

        searchVaccine(){

            axios.get('searchdoc/', { params: { 'dni': this.buscador } })
            .then(response => {
                this.listaVacunas = response.data;
                console.log(this.listaVacunas);

            }).catch(er => {
                // this.errors.push(er)
                console.log(er.response);
            });
        }
    }
})