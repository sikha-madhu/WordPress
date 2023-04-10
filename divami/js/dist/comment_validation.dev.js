"use strict";

jQuery(document).ready(function ($) {
  var nameE = getElementsByClaass("name_com_i")[0];
  var mailE = getElementsByClaass("email_com_i")[0];
  var messageE = getElementsByClaass("message_com_i form__textarea")[0];
  var regexForName = /^[a-zA-Z ]{2,}$/;
  var regexForMessage = /.+/;
  var regexForEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var isInValiedForm = true;

  if (nameE) {
    nameE.onblur = function () {
      if (regexForName.test(nameE.value)) {
        removeClass(nameE, ["error_class"]);
      } else {
        addClass(nameE, ["error_class"]);
      }

      shpf();
    };

    nameE.onfocus = function () {
      shpa();
    };
  }

  if (mailE) {
    mailE.onblur = function () {
      if (regexForEmail.test(mailE.value)) {
        removeClass(mailE, ["error_class"]);
      } else {
        addClass(mailE, ["error_class"]);
      }

      shpf();
    };

    mailE.onfocus = function () {
      shpa();
    };
  }

  if (messageE) {
    messageE.onblur = function () {
      if (regexForMessage.test(messageE.value)) {
        removeClass(messageE, ["error_class"]);
      } else {
        addClass(messageE, ["error_class"]);
      }

      shpf();
    };

    messageE.onfocus = function () {
      shpa();
    };
  }

  $('#commentform').on("submit", function (event) {
    if (messageE) {
      if (regexForMessage.test(messageE.value)) {
        removeClass(messageE, ["error_class"]);
        isInValiedForm = false;
      } else {
        addClass(messageE, ["error_class"]);
        isInValiedForm = true;
      }
    }

    if (nameE) {
      if (regexForName.test(nameE.value)) {
        removeClass(nameE, ["error_class"]);
        isInValiedForm = isInValiedForm || false;
      } else {
        addClass(nameE, ["error_class"]);
        isInValiedForm = true;
      }
    }

    if (mailE) {
      if (regexForEmail.test(mailE.value)) {
        removeClass(mailE, ["error_class"]);
        isInValiedForm = isInValiedForm || false;
      } else {
        addClass(mailE, ["error_class"]);
        isInValiedForm = true;
      }
    }

    if (isInValiedForm) {
      event.preventDefault();
    }
  });
});
//# sourceMappingURL=comment_validation.dev.js.map
