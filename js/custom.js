document.addEventListener('DOMContentLoaded', () => {

	/* PRODUCT PAGE */
	if( document.body.classList.contains('single-product')){

		const acf_wrap = document.querySelector('.acf-fields')
		if( acf_wrap ){

			const details = document.querySelector('.woocommerce-product-details__short-description')
			if( details ){
				details.append( acf_wrap )
			}


		}

	}

})

