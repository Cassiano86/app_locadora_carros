<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login do vue</div>
                <div class="card-body">
                    <form method="POST" @submit.prevent="login()">
                        <input type="hidden" name="csrf_token" :value="csrf_token">
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" v-model="email" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" name="password" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">

                                    <label class="form-check-label" for="remember">
                                        Mantenha-me conectado
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="#">
                                    Esqueceu sua senha?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        props : ['csrf_token'],
        data() {
            return{
                email: 'cassiano@mail.com',
                password:'senha123',
            }
        },
        methods: {
            login() {

                let url = "http://localhost:8000/api/login";

                // new URLSearchParams é nativo do javascript é serve para enviar dados do tipo url encoded, que nem no PostMan no curso de API Rest
                let configuracao = {
                    method: 'POST',
                    body: new URLSearchParams({
                        'email'   : this.email,
                        'password': this.password
                    })
                }

                // O fetch é nativo do javascript, o .then serve para recuperar a resposta de modo assíncrono
                fetch(url, configuracao)
                    .then(response => console.log(response));
            }
        }
    }
</script>
