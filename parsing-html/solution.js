function w10e01l10c01o10me01()
{
	for (var i = 10000; i >= 0; i--) {
		console.log('.....................................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('............w........................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('..............e......................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('................l....................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('..................c..................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('....................o................');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('......................m..............');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('........................e............');
	};
	for (var i = 10000; i >= 0; i--) {
		console.log('.....................................');
	};
	console.log('--------------Dont Close-------------');
}

function p10r01o10c01e10s01s10i01n10g01()
{
	var sleep = require('sleep');
	console.log('Process...');
	sleep.sleep(5);
}

function g10e01t10N01a10m01e10()
{
	var os = require("os");
	var sleep = require('sleep');
	console.log('Hello: '+os.hostname());
	sleep.sleep(3);
}

function g1e0t1C0a1t0e1g0o1r0y1()
{
	var cheerio = require('cheerio');
	var request = require('request');
	var categoryArray = new Array();

	request({
	    method: 'GET',
	    url: 'http://m.bnizona.com/index.php/category/index/promo'
	}, function(err, response, body) {
	    if (err) return console.log('This engine need connection..');
		//cherio
		$ = cheerio.load(body);
		$('ul.menu li a').each(function(i, element) {
		    var category = $(this).text();
		    var url_category = $(this).attr('href');

			categoryArray[category] = {};

			request({
				method: 'GET',
				url: url_category
			}, function(err, response, body) {
				if (err) return console.error(err);
				var j = 0;
				//cherio
				$ = cheerio.load(body);
				$('ul#lists li a').each(function(i, element) {
					var detail = $(this).find('span.promo-title').text();
					var image_url = $(this).find('img').attr('src');
					var title = $(this).find('span.merchant-name').text();
					var valid = $(this).find('span.valid-until').text();

					categoryArray[category][j] = {
						title : title,
						image_url : image_url,
						date_validation : valid,
						detail : detail,
					};
					j=j+1;
				});
				console.log(categoryArray);
			});
			// console.log(categoryArray);
		});
		// console.log(categoryArray);
	});
}

function s1t0o10p1P0r1o0c1e0s1s0()
{
	var sleep = require('sleep');
	console.log("Sorry i can't give you all the code");
	sleep.sleep(3);
	console.log("-------------------------------------");
	sleep.sleep(3);
}

function g1e0t1S0c1r0a1p0e1C0e1r0m1a0t1i0()
{
	w10e01l10c01o10me01();
	p10r01o10c01e10s01s10i01n10g01();
	g10e01t10N01a10m01e10();
	g1e0t1C0a1t0e1g0o1r0y1();
	s1t0o10p1P0r1o0c1e0s1s0();
}

g1e0t1S0c1r0a1p0e1C0e1r0m1a0t1i0();