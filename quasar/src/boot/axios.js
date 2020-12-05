import Vue from 'vue'
import axios from 'axios'

console.log('process.env', process.env)

const axiosInstance = axios.create({
  baseURL: process.env.BACKEND_URL
})

Vue.prototype.$axios = axiosInstance
