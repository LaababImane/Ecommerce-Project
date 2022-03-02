 <template>
        <div class="bg-img" >
  <form class="container" width="200px">
    <h1 style="text-align:center">Login</h1>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" v-model="email" required autofocus>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" v-model="password" required>

    <button type="submit" class="btn-login" @click="handleSubmit">Login</button>
  </form>
</div>
    </template>

    <script>
        export default {
            data() {
                return {
                    email: "",
                    password: ""
                }
            },
            methods: {
                handleSubmit(e) {
                    e.preventDefault()
                    if (this.password.length > 0) {
                        let email = this.email
                        let password = this.password

                        axios.post('api/login', {email, password}).then(response => {
                            let user = response.data.user
                            let is_admin = user.is_admin

                            localStorage.setItem('bigStore.user', JSON.stringify(user))
                            localStorage.setItem('bigStore.jwt', response.data.token)

                            if (localStorage.getItem('bigStore.jwt') != null) {
                                this.$emit('loggedIn')
                                if (this.$route.params.nextUrl != null) {
                                    this.$router.push(this.$route.params.nextUrl)
                                } else {
                                    this.$router.push((is_admin == 1 ? 'admin' : 'dashboard'))
                                }
                            }
                        });
                    }
                }
            }
        }
    </script>
    <style>
    * {
  box-sizing: border-box;
}

.bg-img {
  width: 69%;
  padding-left: 31%;
  min-height: 380px;
  padding-top: 72px;
  /* Center and scale the image nicely */
  position: relative;
}

/* Add styles to the form container */

/* Full-width input fields */
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

/* Set a style for the submit button */
.btn-login {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.btn:hover {
  opacity: 1;
}
@media (max-width: 991px){
/*.bg-img{
  width: 100px;
}*/
}
    </style>