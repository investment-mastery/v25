
<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BuddyBoss_Theme
 */

?>

<?php do_action( THEME_HOOK_PREFIX . 'end_content' ); ?>

</div><!-- .bb-grid -->
</div><!-- .container -->
</div><!-- #content -->

<?php do_action( THEME_HOOK_PREFIX . 'after_content' ); ?>

<?php do_action( THEME_HOOK_PREFIX . 'before_footer' ); ?>
<?php do_action( THEME_HOOK_PREFIX . 'footer' ); ?>
<?php do_action( THEME_HOOK_PREFIX . 'after_footer' ); ?>

</div><!-- #page -->

<?php do_action( THEME_HOOK_PREFIX . 'after_page' ); ?>

<?php wp_footer(); ?>

<?php 
$allowselect2 = true;

$body_class = get_body_class();
//post-type-archive-sfwd-courses
if(in_array("post-type-archive-sfwd-courses", $body_class)){
  $allowselect2 = false;
}
if($allowselect2){
?>

<!-- select js -->
<script>


document.addEventListener('DOMContentLoaded', createSelect, false);
 
function createSelect() {
    var select = document.getElementsByTagName('select'),
      liElement,
      ulElement,
      optionValue,
      iElement,
      optionText,
      selectDropdown,
      elementParentSpan;

      for (var select_i = 0, len = select.length; select_i < len; select_i++) {
        //console.log('selects init');
        /*RAM REMOVED ON 27NOV23
        none to block
        */
      //select[select_i].style.display = 'none';
      //  select[select_i].style.display = 'block';

      wrapElement(document.getElementById(select[select_i].id), document.createElement('div'), select_i, select[select_i].getAttribute('placeholder-text'));

      for (var i = 0; i < select[select_i].options.length; i++) {
        liElement = document.createElement("li");
        optionValue = select[select_i].options[i].value;
        optionText = document.createTextNode(select[select_i].options[i].text);
        liElement.className = 'select-dropdown__list-item';
        liElement.setAttribute('data-value', optionValue);
        liElement.appendChild(optionText);
      //console.log(ulElement,liElement);
        ulElement.appendChild(liElement);

        liElement.addEventListener('click', function () {
          displyUl(this);
        }, false);
      }
    }
    function wrapElement(el, wrapper, i, placeholder) {
      el.parentNode.insertBefore(wrapper, el);
      wrapper.appendChild(el);

      document.addEventListener('click', function (e) {
        let clickInside = wrapper.contains(e.target);
        if (!clickInside) {
          let menu = wrapper.getElementsByClassName('select-dropdown__list');
          menu[0].classList.remove('active');
        }
      });
      /*RAM REMOVED ON 27NOV23*/
     //  var buttonElement = document.createElement("button"),
     //    spanElement = document.createElement("span"),
     //    //spanText = document.createTextNode('All Categories'); // placeholder
     // spanText = document.createTextNode(placeholder);
     //    iElement = document.createElement("i");
     //    ulElement = document.createElement("ul");

     //  wrapper.className = 'select-dropdown select-dropdown--' + i;
     //  buttonElement.className = 'select-dropdown__button select-dropdown__button--' + i;
     //  buttonElement.setAttribute('data-value', '');
     //  buttonElement.setAttribute('type', 'button');
     //  spanElement.className = 'select-dropdown select-dropdown--' + i;
     //  iElement.className = 'zmdi zmdi-chevron-down';
     //  ulElement.className = 'select-dropdown__list select-dropdown__list--' + i;
     //  ulElement.id = 'select-dropdown__list-' + i;

     //  wrapper.appendChild(buttonElement);
     //  spanElement.appendChild(spanText);
     //  buttonElement.appendChild(spanElement);
     //  buttonElement.appendChild(iElement);
     //  wrapper.appendChild(ulElement);
    }

    function displyUl(element) {

      if (element.tagName == 'BUTTON') {
        selectDropdown = element.parentNode.getElementsByTagName('ul');
        //var labelWrapper = document.getElementsByClassName('js-label-wrapper');
        for (var i = 0, len = selectDropdown.length; i < len; i++) {
          selectDropdown[i].classList.toggle("active");
          //var parentNode = $(selectDropdown[i]).closest('.js-label-wrapper');
          //parentNode[0].classList.toggle("active");
        }
      } else if (element.tagName == 'LI') {
        var selectId = element.parentNode.parentNode.getElementsByTagName('select')[0];
        selectElement(selectId.id, element.getAttribute('data-value'));
        elementParentSpan = element.parentNode.parentNode.getElementsByTagName('span');
        element.parentNode.classList.toggle("active");
        elementParentSpan[0].textContent = element.textContent;
        elementParentSpan[0].parentNode.setAttribute('data-value', element.getAttribute('data-value'));
      }

    }
    function selectElement(id, valueToSelect) {
      var element = document.getElementById(id);
      element.value = valueToSelect;
      element.setAttribute('selected', 'selected');
    }
    var buttonSelect = document.getElementsByClassName('select-dropdown__button');
    for (var i = 0, len = buttonSelect.length; i < len; i++) {
      buttonSelect[i].addEventListener('click', function (e) {
        e.preventDefault();
        displyUl(this);
      }, false);
    }
}
  


// jQuery("#timerone").click(function(){
//    jQuery("#two").removeClass("timetrackeractive");
//    jQuery("#one").addClass("timetrackeractive");

//   jQuery("#manaual_tracker").hide();
//    jQuery("#timer_tracker").show();

// });


// jQuery("#manualone").click(function(){
//   jQuery("#one").removeClass("timetrackeractive");
//    jQuery("#two").addClass("timetrackeractive");
//   jQuery("#timer_tracker").hide();
//    jQuery("#manaual_tracker").show();

// });


// jQuery("#start_session").click(function(){

//   jQuery("#starttracker").hide();
//   jQuery("#starttracker1").show();

//   jQuery("#start_session").hide();
//   jQuery("#start_session_btn").show();

// });


// jQuery("#start_session_btn").click(function(){

//   jQuery("#start_session_btn").hide();
//   jQuery(".resumebtns").show();

// });

// jQuery("#resume").click(function(){

//   jQuery("#start_session_btn").show();
//   jQuery(".resumebtns").hide();

// });


// jQuery("#finish").click(function(){

//   jQuery("#resume_session").show();
//   jQuery(".resumebtns").hide();

// });

// jQuery("#resume_session").click(function(){

//   jQuery("#starttracker1").show();
//   jQuery("#start_session_btn").show();
//   jQuery("#resume_session").hide();

// });


// jQuery(".continue").click(function(){

//   jQuery("#complted").show();
//   jQuery("#congo").show();
//   jQuery("#starttracker1").show();
//   jQuery("#desc_headinng").hide();
//   jQuery("#start_session").hide();
//   jQuery("#start_session_btn").hide();
   

// });

// jQuery("#close_btn").click(function(){

//   jQuery("#complted").show();
//   jQuery("#congo").show();
//   jQuery("#starttracker1").show();
//   jQuery("#desc_headinng").hide();
//   jQuery("#start_session").hide();
//   jQuery("#start_session_btn").hide();
   

// });




</script>
<?php 
}
?>

<!-- select js -->






</body>
</html>
