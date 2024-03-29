// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  runtimeConfig: {
    googleApiKey: process.env.GOOGLE_API_KEY
  },
  devtools: { enabled: true },
  css: [
    '@/assets/css/tailwind.css'
  ],
  modules: [
    '@nuxtjs/tailwindcss',
    '@vee-validate/nuxt',
    '@pinia/nuxt',
  ],
  app: {
    head: {
      script: [
        {
          src: `https://maps.googleapis.com/maps/api/js?key=${process.env.GOOGLE_API_KEY}&libraries=places`,
          defer: true,
        },
      ],
      title: 'Build Online Challenge',
      meta: [
        { name: 'viewport' , content: 'width=device-width, initial-scale=1'}
      ],
      link: [
        { rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css' },
      ]
    }
  }
})