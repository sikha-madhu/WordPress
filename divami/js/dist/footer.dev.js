"use strict";

(function ($) {
  /** 
  * Google Analytics constants
  */
  // dynamic label for form --start
  $(document).ready(function () {
    msieversion();
    var length = location.pathname.split("/").length;
    var pagename = location.pathname.split('/')[length - 1].split('.')[0];
    $('.error_box').hide();
    footerTracking(pagename); // footer year number script

    var year = new Date().getFullYear();
    $('.footer-year').text(year);
    $('.contact-form__block').submit(function (event) {
      event.preventDefault();
      doFormValidation();
      return false;
    });

    function validateInputField(element, regularExpression) {
      if ($(element).val() == regularExpression) {
        return false;
      } else {
        return true;
      }
    }

    function validateEmail() {
      if ($('.email').val() == '') {
        return false;
      } else {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var validEmail = emailReg.test($('.email').val());

        if (!validEmail) {
          return false;
        } else {
          return true;
        }
      }
    }

    function doFormValidation() {
      var msg = validateInputField('.form__message', '');
      var name = validateInputField('.name', '');
      var email = validateEmail();
      var company = validateInputField('.company', '');

      if (!msg || !email || !name || !company) {
        console.log("not submit", msg, name, email, company);
        var $errorBox = $('.error_box');
        $errorBox.addClass("fixed");

        if ($errorBox.hasClass("success")) {
          $errorBox.removeClass("success");
        }

        $('.error_message').html("Please fill all the required details correctly.");
        $errorBox.show();
        setTimeout(function () {
          $errorBox.hide();
        }, 5000);
        return false;
      } else {
        var $bForm = $('.contact-form__block');
        doAjaxCall({
          formSelector: $bForm
        });
      }
    }

    function doAjaxCall(form) {
      var $form = $(form.formSelector);
      var form = $form[0];
      var data = $form.serializeArray();

      for (var i = 0; i < data.length; i++) {
        if (data[i].name === "search") data[i].name = "name";
      }

      var resetForm = function resetForm() {
        form.reset();
      };

      var headers = {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      };
      doAjaxCallForForm('POST', "https://api.hsforms.com/submissions/v3/integration/submit/3775710/329369a9-dc11-4137-a1ae-52b3aa419d51", data, headers, successAlert, tempAlert, resetForm);
    }

    function hideSuccessFailureBlock(msg) {
      $('.error_box').addClass("fixed");
      $('.error_message').html(msg);
      $('.error_box').show();
      setTimeout(function () {
        $('.error_box').hide();
      }, 5000);
    }

    function tempAlert() {
      if ($('.error_box').hasClass("success")) {
        $('.error_box').removeClass("success");
      }

      hideSuccessFailureBlock("Sorry, Try again");
    }

    function successAlert() {
      $('.error_box').addClass("success");
      hideSuccessFailureBlock("Thank you for your submission.");
    }

    function footerTracking(pagename) {
      var footerToAppend = pagename + " page Footer";
      var pageToAppend = pagename + " page";
      $('.footer__header-link').click(function () {
        var link = $(this).text();
        google_analytics_tracking(pageToAppend, link, '');
      });
    }

    function doAjaxCallForForm(callType, url, data, callHeaders, successCallback, errorCallback, completeCallback) {
      $.ajax(url, {
        type: callType,
        data: JSON.stringify({
          fields: data,
          context: {
            pageUri: window.location.href
          }
        }),
        dataType: "json",
        headers: callHeaders,
        success: function success(response) {
          successCallback();
        },
        error: function error(response) {
          errorCallback();
        },
        complete: function complete(response) {
          completeCallback();
        }
      });
    }

    function footerTracking(pagename) {
      var footerToAppend = pagename + " page Footer";
      var pageToAppend = pagename + " page";
      $('.footer__header-link').click(function () {
        var link = $(this).text();
        google_analytics_tracking(pageToAppend, link, '');
      });
      $('.footer__social-link').click(function () {
        var ClickElementtName = $(this).attr('title');
        google_analytics_tracking(footerToAppend, ClickElementtName, '');
      });
      $('.address__icon').click(function () {
        google_analytics_tracking(footerToAppend, GA_ADDRESS, '');
      });
    }

    $(".form__input.contactnumber").keypress(function (event) {
      var charCode = event.which ? event.which : event.keyCode;
      if (charCode != 43 && charCode != 40 && charCode != 41 && charCode != 45 && charCode > 31 && (charCode < 48 || charCode > 57)) return false;
      return true;
    });
  });

  function msieversion() {
    var isIE =
    /*@cc_on!@*/
    false || !!document.documentMode;

    if (isIE) {
      $('.google_reviews.clutch').css('display', 'flex');
      $('.clutch-widget').css('display', 'none');
    }
  }
})(jQuery);
//# sourceMappingURL=footer.dev.js.map
