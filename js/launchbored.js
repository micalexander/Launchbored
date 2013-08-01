$("#channel").keyup(function() {
    var search = $(this).val().toLowerCase().trim();
    $('#container').isotope({
        filter: "[name*='"+search+"'],[class*='"+search+"'],[title*='"+search+"']"

    });
});

function formReset() {
    document.getElementById("filtersearch").reset();
    $('#channel').keyup();
}

// cache container
var $container = $('#container');
// initialize isotope
$container.isotope();

// filter items when filter link is clicked
$('#filters a').click(function(){
  var selector = $(this).attr('data-filter');
  $container.isotope({ filter: selector });
  return false;
});


$.Isotope.prototype._masonryResizeChanged = function() {
return true;
};

$.Isotope.prototype._masonryReset = function() {
// layout-specific props
this.masonry = {};
this._getSegments();
var i = this.masonry.cols;
this.masonry.colYs = [];
while (i--) {
  this.masonry.colYs.push( 0 );
}

if ( this.options.masonry.cornerStampSelector ) {
  var $cornerStamp = this.element.find( this.options.masonry.cornerStampSelector ),
      stampWidth = $cornerStamp.outerWidth(true) - ( this.element.width() % this.masonry.columnWidth ),
      cornerCols = Math.ceil( stampWidth / this.masonry.columnWidth ),
      cornerStampHeight = $cornerStamp.outerHeight(true);
  for ( i = Math.max( this.masonry.cols - cornerCols, cornerCols ); i < this.masonry.cols; i++ ) {
    this.masonry.colYs[i] = cornerStampHeight;
  }
}
};


$(function(){
  var $container = $('#container');

  // add randomish size classes
  $container.find('.item').each(function(){
    var $this = $(this),
        number = parseInt( $this.find('.number').text(), 10 );
    if ( number % 7 % 2 === 1 ) {
      $this.addClass('width2');
    }
    if ( number % 3 === 0 ) {
      $this.addClass('height2');
    }
  });

$container.isotope({
  itemSelector : '.item',
  masonry : {
    columnWidth : 200,
    cornerStampSelector: '.corner-stamp'
  },
  getSortData : {
    symbol : function( $elem ) {
      return $elem.attr('data-symbol');
    },
    category : function( $elem ) {
      return $elem.attr('data-category');
    },
    number : function( $elem ) {
      return parseInt( $elem.find('.number').text(), 10 );
    },
    weight : function( $elem ) {
      return parseFloat( $elem.find('.weight').text().replace( /[\(\)]/g, '') );
    },
    name : function ( $elem ) {
      return $elem.find('.name').text();
    }
  }
});


  var $optionSets = $('#options .option-set'),
      $optionLinks = $optionSets.find('a');

  $optionLinks.click(function(){
    var $this = $(this);
    // don't proceed if already selected
    if ( $this.hasClass('selected') ) {
      return false;
    }
    var $optionSet = $this.parents('.option-set');
    $optionSet.find('.selected').removeClass('selected');
    $this.addClass('selected');

    // make option object dynamically, i.e. { filter: '.my-filter-class' }
    var options = {},
        key = $optionSet.attr('data-option-key'),
        value = $this.attr('data-option-value');
    // parse 'false' as false boolean
    value = value === 'false' ? false : value;
    options[ key ] = value;
    if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
      // changes in layout modes need extra logic
      changeLayoutMode( $this, options )
    } else {
      // otherwise, apply new options
      $container.isotope( options );
    }

    return false;
  });



  $('#insert a').click(function(){
    var $newEls = $( fakeElement.getGroup() );
    $container.isotope( 'insert', $newEls );

    return false;
  });

  $('#append a').click(function(){
    var $newEls = $( fakeElement.getGroup() );
    $container.append( $newEls ).isotope( 'appended', $newEls );

    return false;
  });



  // change size of clicked element
  $container.delegate( '.item', 'click', function(){
    $(this).toggleClass('large');
    $container.isotope('reLayout');
  });

  // toggle variable sizes of all elements
  $('#toggle-sizes').find('a').click(function(){
    $container
      .toggleClass('variable-sizes')
      .isotope('reLayout');
    return false;
  });


var $sortBy = $('#sort-by');
$('#shuffle a').click(function(){
  $container.isotope('shuffle');
  $sortBy.find('.selected').removeClass('selected');
  $sortBy.find('[data-option-value="random"]').addClass('selected');
  return false;
});

$('.item').click(function () {

    var articles = $(this).find('article');
    articles.each(function(){
        var imageUrl = $(this).attr('data-image');

        if (imageUrl !== '')
        {
            $('<img src="'+imageUrl+'" />').prependTo($(this));
        }
    });

    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        $(this).find('.maximise').hide();
        $(this).find('.minimise').show();
    } else {
        $(this).addClass('selected');
        $(this).find('.minimise').hide();
        $(this).find('.maximise').show();
    }

    /*$container.isotope('shuffle');*/
    $container.isotope('reLayout');
});

    $('#expandall').toggle(function(){
        //maxmise
        $('.item').addClass('selected large');
        $('.maximise').show();
        $('.minimise').hide();
    }, function(){
        //minimise
        $('.item').removeClass('selected large');
        $('.maximise').hide();
        $('.minimise').show();
    });

    $('#expandall').click(function(){
        $(this).toggle();
        $(this).show();
        $container.isotope('reLayout');
    });
});