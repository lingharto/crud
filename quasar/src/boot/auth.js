// import { VueJwtAuth, AxiosHttpDriver } from 'quasar-auth/vuejwtauth'

// export default ({ Vue, store, router }) => new VueJwtAuth({
//   Vue,
//   router,
//   store,
//   options: { // optional
//     drivers: {
//       http: new AxiosHttpDriver({
//         // Your API URL here
//         apiBaseURL: process.env.BACKEND_URL
//       })
//     },
//     apiEndpoints: {
//       login: {
//         method: 'post',
//         url: 'auth/login',
//       },
//       refreshToken: {
//         method: 'post',
//         url: 'auth/refresh',
//       },
//       fetchUser: {
//         method: 'post',
//         url: 'auth/me',
//       }
//     }
//     // *  - apiEndpoints.login.method
//     //   *  - apiEndpoints.login.url
//     //   *  - fetchUserAfterLogin
//     //   *  - refreshTokenAfterLogin
//     //   *  - fetchUserAfterTokenRefreshed
//   }
// })
