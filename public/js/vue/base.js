const appPer = new Vue({
    delimiters: ['[[', ']]'],
    el: '#appVaccine',
    data:{
        errors: [],
        view: true,
        buscador: '',
        listaVacunas: [],
        view_data: false,
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
            this.view_data = false;
        },

        searchVaccine(){
            if(this.buscador.length < 8){
                toastr.warning('La cantidad de dígitos es incorrecto', null, { "closeButton": true, "progressBar": true });
            }else{
                axios.get('searchdoc/', { params: { 'dni': this.buscador } })
                .then(response => {
                    this.listaVacunas = response.data;
                    this.view_data = true;
                    this.buscador = '';
                    this.listaVacunas[0].PRIMERA_GRUPO != null ? first = this.listaVacunas[0].PRIMERA_GRUPO.replace('ni', 'ñ') : first = null;
                    this.listaVacunas[0].SEGUNDA_GRUPO != null ? second = this.listaVacunas[0].SEGUNDA_GRUPO.replace('ni', 'ñ') : second = null;
                    this.listaVacunas[0].TERCERA_GRUPO != null ? third = this.listaVacunas[0].TERCERA_GRUPO.replace('ni', 'ñ') : third = null;
                    this.listaVacunas[0].CUARTA_GRUPO != null ? fourth = this.listaVacunas[0].CUARTA_GRUPO.replace('ni', 'ñ') : fourth = null;
                    this.listaVacunas[0].first = first;
                    this.listaVacunas[0].second = second;
                    this.listaVacunas[0].thirds = third;
                    this.listaVacunas[0].fourth = fourth;

                }).catch(er => {
                    this.errors.push(er)
                });
            }
        },

        searchVaccineInput(e){
            if (e.keyCode === 13) {
                if(this.buscador.length < 8){
                    toastr.warning('La cantidad de dígitos es incorrecto', null, { "closeButton": true, "progressBar": true });
                }else{
                    axios.get('searchdoc/', { params: { 'dni': this.buscador } })
                    .then(response => {
                        this.listaVacunas = response.data;
                        this.view_data = true;
                        this.buscador = '';
                        this.listaVacunas[0].PRIMERA_GRUPO != null ? first = this.listaVacunas[0].PRIMERA_GRUPO.replace('ni', 'ñ') : first = null;
                        this.listaVacunas[0].SEGUNDA_GRUPO != null ? second = this.listaVacunas[0].SEGUNDA_GRUPO.replace('ni', 'ñ') : second = null;
                        this.listaVacunas[0].TERCERA_GRUPO != null ? third = this.listaVacunas[0].TERCERA_GRUPO.replace('ni', 'ñ') : third = null;
                        this.listaVacunas[0].CUARTA_GRUPO != null ? fourth = this.listaVacunas[0].CUARTA_GRUPO.replace('ni', 'ñ') : fourth = null;
                        this.listaVacunas[0].first = first;
                        this.listaVacunas[0].second = second;
                        this.listaVacunas[0].thirds = third;
                        this.listaVacunas[0].fourth = fourth;

                    }).catch(er => {
                        this.errors.push(er)
                    });
                }
            }
        },

        clear(){
            this.buscador = '';
            this.view_data = false
        }
    }
})