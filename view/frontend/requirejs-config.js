var config = {
    paths: {
			'cwsflexslider' : 'Dotsquare_Banner/js/responsivebannerslider/jquery.flexslider',
			'cwsfroogaloop' : 'Dotsquare_Banner/js/responsivebannerslider/froogaloop',
			'cwseasing' : 'Dotsquare_Banner/js/responsivebannerslider/jquery.easing',
			'cwsfitvid' : 'Dotsquare_Banner/js/responsivebannerslider/jquery.fitvid',
			'cwslazy' : 'Dotsquare_Banner/js/responsivebannerslider/jquery.lazy'
	},
    shim: {
        'cwsflexslider': {
            deps: ['jquery']
        },
		'cwsfroogaloop': {
            deps: ['jquery']
        },
		'cwseasing': {
            deps: ['jquery']
        },
		'cwsfitvid': {
            deps: ['jquery']
        },
		'cwslazy': {
            deps: ['jquery']
        },    
    }	
};