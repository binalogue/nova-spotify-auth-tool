Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'nova-spotify-auth-resource-tool',
            path: '/nova-spotify-auth-resource-tool',
            component: require('./components/Tool'),
        },
    ])
})
