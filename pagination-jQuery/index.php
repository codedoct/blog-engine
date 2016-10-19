<style>
	li.content{
		list-style: none;
		border: 1px solid #ddd;
		padding: 8px;
		width: 100px;
		display: inline-block;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
	//paginate
	$(function(){
		showPage(1);
	});
	function prevPage(button)
	{
		var max_page = $('.list-content').find('input[name=max_page]').val();
		var pages = $('.list-content').find('.prev').data('pages');
		var page_show = pages - 1;
		$('.list-content').find('.prev').data('pages', page_show);
		$('.list-content').find('.next').data('pages', page_show);
		$('.list-content').find('span.current-page').html(page_show);
		if (page_show == 1) {
			$(button).prop('disabled', true);
		}
		if (page_show < max_page) {
			$('.list-content').find('.next').prop('disabled', false);
		}
		showPage(page_show);
	}
	function nextPage(button)
	{
		var max_page = $('.list-content').find('input[name=max_page]').val();
		var pages = $('.list-content').find('.next').data('pages');
		var page_show = pages + 1;
		$('.list-content').find('.next').data('pages', page_show);
		$('.list-content').find('.prev').prop('disabled', false);
		$('.list-content').find('.prev').data('pages', page_show);
		$('.list-content').find('span.current-page').html(page_show);
		if (page_show==max_page) {
			$(button).prop('disabled', true);
		}
		showPage(page_show);
	}
	function showPage(page)
	{
		var max_page = $('.list-content').find('input[name=max_page]').val();
		pageSize = 4;
		$(".list-content").find('.content').hide();
	    $(".list-content").find('.content').each(function(n) {
	        if (n >= pageSize * (page - 1) && n < pageSize * page)
	            $(this).show();
	    });
	    if (max_page==1) {
			$('.list-content').find('.next').prop('disabled', true);
	    };
	}
	//end paginate
</script>

<?php
	$buah = array(
		'0' => array(
			'name' => 'jeruk',
			'warna' => 'orange',
		),
		'1' => array(
			'name' => 'apel',
			'warna' => 'merah',
		),
		'2' => array(
			'name' => 'anggur',
			'warna' => 'ungu',
		),
		'3' => array(
			'name' => 'durian',
			'warna' => 'kuning',
		),
		'4' => array(
			'name' => 'jambu',
			'warna' => 'hijau',
		),
		'5' => array(
			'name' => 'melon',
			'warna' => 'hijau',
		),
		'6' => array(
			'name' => 'semangka',
			'warna' => 'hijau',
		),
		'7' => array(
			'name' => 'nanas',
			'warna' => 'kuning',
		),
		'8' => array(
			'name' => 'manggis',
			'warna' => 'ungu',
		),
	);

	//paginate 4/page
	$total_buah = count($buah);
	$whole = $total_buah/4;
	if (is_integer($whole) AND $whole!=0) {
		$floor = floor($whole);
		$max_page = $floor;
	} else if ($whole==0) {
		$max_page = 1;
	} else {
		$floor = floor($whole);
		$max_page = $floor + 1;
	}
?>

<div class="list-content">
	<input type="hidden" name="max_page" value="<?=$max_page;?>">
	<?php foreach ($buah as $info_buah) { ?>
		<li class="content">
			<?=$info_buah['name'].'<br>'.$info_buah['warna'];?>
		</li>
	<?php } ?>
	<br>
	<br>
	<br>
	<div class="paginate text-center">
		<button type="button" disabled onclick="prevPage(this)" data-pages="" class="prev">Prev</button> | <span class="current-page">1</span> of <?=$max_page;?> | <button type="button" onclick="nextPage(this)" data-pages="1" class="next">Next</button>
	</div>
</div>

