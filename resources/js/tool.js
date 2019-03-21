Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-spotify-auth-tool',
            path: '/nova-spotify-auth-tool',
            component: require('./components/Tool'),
        },
    ])
})
