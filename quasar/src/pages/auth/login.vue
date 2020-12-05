<template>
  <q-page
    class="window-height window-width row justify-center items-center"
  >
<!--    style="background: linear-gradient(#7486c5, #4a669f);"-->

    <div class="column q-pa-md">
      <div class="row">
        <q-card square class="shadow-24" style="width:300px;height:338px;">
          <q-card-section class="bg-blue-9">
            <h4 class="text-h5 text-white q-my-none">Login</h4>
          </q-card-section>
          <q-card-section>
            <q-form class="q-px-none">
              <q-input outlined clearable v-model="email" type="email" label="Email">
                <template v-slot:prepend>
                  <q-icon name="las la-at" />
                </template>
              </q-input>

              <q-input class="q-mt-md" outlined clearable v-model="password" type="password" label="Password">
                <template v-slot:prepend>
                  <q-icon name="las la-key" />
                </template>
              </q-input>
            </q-form>
          </q-card-section>

          <q-card-actions class="q-px-md">
            <q-btn @click="login" unelevated size="lg" color="primary" class="full-width text-white" label="Sign In" />
          </q-card-actions>
          <q-card-section class="text-center q-pa-sm">
            <p class="text-grey-6">Forgot your password?</p>
          </q-card-section>
        </q-card>
      </div>
    </div>

  </q-page>
</template>

<script>
  export default {
    name: 'Login',
    data() {
      return {
        email: '',
        password: '',
        rememberMe: true,
      }
    },
    methods: {
      login() {
        this.$auth.attemptLogin(
          {
            email: this.email,
            password: this.password
          },
          this.rememberMe
        ).then(response => {
          console.log(JSON.stringify(response))
          console.log('You were logged in')
          this.$router.push({'name': 'home'})
        }).catch(error => {
          console.log(JSON.stringify(error))
          console.log(error && error.response && error.response.status === 401
            ? 'Wrong e-mail or password'
            : 'Something went wrong'
          )
        })
      }
    }
  }
</script>
