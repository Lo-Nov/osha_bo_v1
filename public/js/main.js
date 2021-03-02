
$(document).ready(function () {


	var to_day=moment().format('ddd, MMMM Do YYYY');
	$('.date-range-text').text(to_day);
	$('.today').text(moment().format("MMM Do YY"));
	
	$('.year-abr').text(moment().format('YY'));
	$('.this-year').text(moment().format('YYYY'));
	$('.this-month').text(moment().format('MMMM'));
	$('.month-abr').text(moment().format('MMM'));

	$('.full-month').text(moment().format('MMMM'));
	$('.full-year').text(moment().format('YYYY'));
	$('.today-full').text(moment().format("MMM Do YY"));

	const today = moment();
		const otherday=moment()
		const too_date = otherday.endOf('week');	
		const from_date = today.startOf('week');			
		const the_date=from_date.format("DD, MMM")+' To '+too_date.format("DD, MMM");
		$('.week-full').text(the_date);
		//alert(from_date);




	//alert(moment().format('MMMM Do YYYY, h:mm:ss a'));
            
            $('#data-table tbody tr').each(function(index){
                var testDate=$(this).children('.testDate').text();

                var formated_date=moment(testDate,'YYYY-MM-DD h:mm:ss').format('ll');

                $(this).children('.testDate').text(formated_date);
                // alert(formated_date);
			});
		
			$('#data-table tbody tr').each(function(index){
                var testDate=$(this).children('.change-date').text();

                var formated_date=moment(testDate,'YYYY-MM-DD h:mm:ss').format('ll');

                $(this).children('.change-date').text(formated_date);
                // alert(formated_date);
			});
			
			


	$('#data-table').on('click','.delete-record', function () {
		$('.notification-container').addClass('fadeIn');

		$('.notification-container').removeClass('d-none');

		$('.notification-container').removeClass('fadeOut');
		$('.notification-container').removeClass('d-none');
		$('.notification-container .card').addClass('bounceUp');
		var title="lamba;";
		var title=$(this).parent().parent().siblings('.biz-name').text();
		$('#record-name').text(title);
		
		console.log(title);
	});
	
	$('.row').on('click','.upload-file', function () {
		$('.drop-file-container').addClass('fadeIn');

		$('.drop-file-container').removeClass('d-none');

		$('.drop-file-container').removeClass('fadeOut');
		$('.drop-file-container').removeClass('d-none');
		$('.drop-file-container .card').addClass('bounceUp');
		
	});

	$('.close-droper').on('click', function () {
		closedrop();
	});
	
	$('.close-delete').on('click', function () {
		closedeletealert();
	});

	function closedeletealert() {
		$('.notification-container').addClass('fadeOut');
		$('.notification-container').addClass('d-none');
		$('.notification-container .card').addClass('fadeOutDown');

		setTimeout(function () {
			$('.notification-container').removeClass('fadeOut');
			$('.notification-container .card').removeClass('fadeOutDown');
		}, 1000);
	}
	
	function closedrop() {
		$('.drop-file-container').addClass('fadeOut');
		$('.drop-file-container').addClass('d-none');
		$('.drop-file-container .card').addClass('fadeOutDown');

		setTimeout(function () {
			$('.drop-file-container').removeClass('fadeOut');
			$('.drop-file-container .card').removeClass('fadeOutDown');
		}, 1000);
	}


	
	
	
});

//owl initializer
$(document).ready(function(){
	

	var owl = $('.owl-carousel');
	owl.owlCarousel({
		
		items:1,
		loop:true,
		margin:10,
		autoplay:true,
		autoplayTimeout:10000,
		nav:false,
		
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1
			},
			768:{
				items:1
			},
			992:{
				items:1
			},
			1200:{
				items:1
			},
			1440:{
				items:1
			}
		}
	});

  });
