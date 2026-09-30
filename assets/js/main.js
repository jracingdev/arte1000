/**
 * ARTE1000 — interações do tema.
 */
( function () {
	'use strict';

	var doc = document.documentElement;
	doc.classList.add( 'a1-js' );

	var header = document.getElementById( 'a1-header' );
	var nav = document.getElementById( 'a1-nav' );
	var toggle = document.querySelector( '.a1-header__toggle' );
	var navClose = document.querySelector( '.a1-nav__close' );
	var overlay = document.querySelector( '[data-a1-overlay]' );
	var search = document.getElementById( 'a1-search' );

	/* Sombra no cabeçalho ao rolar */
	function onScroll() {
		if ( header ) {
			header.classList.toggle( 'is-scrolled', window.scrollY > 8 );
		}
	}
	window.addEventListener( 'scroll', onScroll, { passive: true } );
	onScroll();

	/* Menu mobile */
	function openNav() {
		if ( ! nav ) return;
		nav.classList.add( 'is-open' );
		overlay && overlay.classList.add( 'is-active' );
		toggle && toggle.setAttribute( 'aria-expanded', 'true' );
		document.body.style.overflow = 'hidden';
		var first = nav.querySelector( '.a1-menu a' );
		first && first.focus();
	}

	function closeNav() {
		if ( ! nav ) return;
		nav.classList.remove( 'is-open' );
		toggle && toggle.setAttribute( 'aria-expanded', 'false' );
		document.body.style.overflow = '';
	}

	/* Busca */
	function openSearch() {
		if ( ! search ) return;
		search.hidden = false;
		overlay && overlay.classList.add( 'is-active' );
		var input = search.querySelector( 'input[type="search"]' );
		input && setTimeout( function () { input.focus(); }, 50 );
	}

	function closeSearch() {
		if ( ! search ) return;
		search.hidden = true;
	}

	function closeAll() {
		closeNav();
		closeSearch();
		overlay && overlay.classList.remove( 'is-active' );
	}

	toggle && toggle.addEventListener( 'click', openNav );
	navClose && navClose.addEventListener( 'click', closeAll );
	overlay && overlay.addEventListener( 'click', closeAll );

	document.querySelectorAll( '[data-a1-search-open]' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', openSearch );
	} );
	document.querySelectorAll( '[data-a1-search-close]' ).forEach( function ( btn ) {
		btn.addEventListener( 'click', closeAll );
	} );

	document.addEventListener( 'keydown', function ( e ) {
		if ( 'Escape' === e.key ) {
			closeAll();
		}
	} );

	/* Fecha o menu ao clicar em âncoras internas */
	nav && nav.addEventListener( 'click', function ( e ) {
		var link = e.target.closest( 'a' );
		if ( link && link.hash && link.pathname === window.location.pathname ) {
			closeAll();
		}
	} );

	/* Animações de entrada */
	var items = document.querySelectorAll( '[data-a1-reveal]' );
	if ( 'IntersectionObserver' in window ) {
		var io = new IntersectionObserver( function ( entries ) {
			entries.forEach( function ( entry ) {
				if ( entry.isIntersecting ) {
					entry.target.classList.add( 'is-visible' );
					io.unobserve( entry.target );
				}
			} );
		}, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 } );

		items.forEach( function ( el, i ) {
			// Leve escalonamento entre itens irmãos.
			var siblings = el.parentElement ? Array.prototype.indexOf.call( el.parentElement.children, el ) : 0;
			el.style.transitionDelay = Math.min( siblings, 5 ) * 70 + 'ms';
			io.observe( el );
		} );
	} else {
		items.forEach( function ( el ) {
			el.classList.add( 'is-visible' );
		} );
	}
}() );
