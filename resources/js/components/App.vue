  <template>
        <div id="navbar">
            <nav class="navbar navbar-expand-md navbar-light navbar-laravel  fixed-top" style="background: #fff;">
                <div class="container" style="padding-top: 10px;">
                    <router-link :to="{name: 'home'}" class="navbar-brand"><img src="https://www.freepnglogos.com/uploads/starbucks-logo-png-25.png" class="logo"> Starbucks</router-link>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto"></ul>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <router-link :to="{ name: 'Accueil' }" class="nav-link" >Home</router-link>
                            <router-link :to="{ name: 'home' }" class="nav-link" >Menu</router-link>
                            <router-link :to="{ name: 'about' }" class="nav-link" >Our Company</router-link>
                          <router-link :to="{ name: 'login' }" class="nav-link" v-if="!isLoggedIn" id="login">Login</router-link>
                            <router-link :to="{ name: 'register' }" class="nav-link" v-if="!isLoggedIn">Register</router-link>
                            <span v-if="isLoggedIn">
                                <router-link :to="{ name: 'userboard' }" class="nav-link" v-if="user_type == 0"> <img id="admin-icon" src="img/shopping-cart-.png" width="27px"></router-link>
                                <router-link :to="{ name: 'admin' }" class="nav-link" v-if="user_type == 1"> <img id="cart-icon" src="img/admin.png" width="30px"></router-link>
                            </span>
                            <li class="nav-link" v-if="isLoggedIn" @click="logout"> Logout</li>
                        </ul>
                    </div>
                </div>
            </nav>
            <main class="py-4">
                <router-view @loggedIn="change"></router-view>
            </main>
        </div>
    </template>

    <script>
    export default {
        data() {
            return {
           Fname: null,
            user_type: 0,
                isLoggedIn: localStorage.getItem('bigStore.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('bigStore.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('bigStore.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('bigStore.jwt')
                localStorage.removeItem('bigStore.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>

    <style>
    .logo{
            position: relative;
            max-width: 50px;
        }
    #navbar{
        background:#fff;
        margin-top: -5%;
    }/*
     .loginbtn{
           position: relative;
            display: inline-block;
            background: linear-gradient(90deg,#017143,#73dd93);
            border-radius: 40px;
            overflow: hidden;
            width: 100px;

     }

#login {
    color: #fff;
}*/
    </style>