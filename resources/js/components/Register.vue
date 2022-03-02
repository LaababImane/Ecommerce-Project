<template>
        <div class="container" style="margin-top: 88px;">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div>
                        <h1 style="text-align:center">Register</h1>
                        
                            <form>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"><b>Name</b></label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" placeholder="Enter Name" v-model="name" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><b>E-Mail Address</b></label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" placeholder="Enter Email" style="background:#f1f1f1 ;border: none" v-model="email" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"><b>Password</b></label>
                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" placeholder="Enter Password" v-model="password" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><b>Confirm Password</b></label>
                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" v-model="password_confirmation" required>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success " style="padding: 16px 20px; 
                                        border: none;
                                        cursor: pointer;
                                        width: 100%;" @click="handleSubmit">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </template>

    <script>
    export default {
        props : ['nextUrl'],
        data(){
            return {
                name : "",
                email : "",
                password : "",
                password_confirmation : ""
            }
        },
        methods : {
            handleSubmit(e) {
                e.preventDefault()
                if (this.password !== this.password_confirmation || this.password.length <= 0) {
                    this.password = ""
                    this.password_confirmation = ""
                    return alert('Passwords do not match')
                }
                let name = this.name
                let email = this.email
                let password = this.password
                let c_password = this.password_confirmation
                axios.post('api/register', {name, email, password, c_password}).then(response => {
                    let data = response.data
                    localStorage.setItem('bigStore.user', JSON.stringify(data.user))
                    localStorage.setItem('bigStore.jwt', data.token)
                    if (localStorage.getItem('bigStore.jwt') != null) {
                        this.$emit('loggedIn')
                        let nextUrl = this.$route.params.nextUrl
                        this.$router.push((nextUrl != null ? nextUrl : '/'))
                    }
                })
            }
        }
    }
    </script>

<style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}
</style>