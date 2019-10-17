const form = new Vue({
    el: '#form',
    data: {
        errors: [],
        idemail: null,
        idpasword: null
    },
    methods: {
        checkForm: function (e) {
            if (this.idemail && this.idpasword) {
                return true;
            }

            this.errors = [];

            if (!this.idemail) {
                this.errors.push('El email es obligatorio.');
            }
            if (!this.idpasword) {
                this.errors.push('la contraseña es obligatoria.');
            }

            e.preventDefault();
        }
    }
})