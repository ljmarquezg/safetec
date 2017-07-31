/* Float Label Pattern Plugin for Bootstrap 3.1.0 by Travis Wilson
**************************************************/
(function ($) {

    $.fn.floatLabels = function (options) {

        // Settings
        var self = this;
        var settings = $.extend({}, options);


        // Event Handlers
        function registerEventHandlers() {
            self.on('input keyup change', 'input, textarea', function () {
                actions.swapLabels(this);
            });
        }


        // Actions
        var actions = {
            initialize: function() {
                self.each(function () {
                    var $this = $(this);
                    var $label = $this.children('label');
                    var $field = $this.find('input,textarea').first();

                    if ($this.children().first().is('label')) {
                        $this.children().first().remove();
                        $this.append($label);
                    }

                    var placeholderText = ($field.attr('placeholder') && $field.attr('placeholder') != $label.text()) ? $field.attr('placeholder') : $label.text();

                    $label.data('placeholder-text', placeholderText);
                    $label.data('original-text', $label.text());

                    if ($field.val() == '') {
                        $field.addClass('empty')
                    }
                });
            },
            swapLabels: function (field) {
                var $field = $(field);
                var $label = $(field).siblings('label').first();
                var isEmpty = Boolean($field.val());

                if (isEmpty) {
                    $field.removeClass('empty');
                    $label.text($label.data('original-text'));
                }
                else {
                    $field.addClass('empty');
                    $label.text($label.data('placeholder-text'));
                }
            }
        }


        // Initialization
        function init() {
            registerEventHandlers();

            actions.initialize();
            self.each(function () {
                actions.swapLabels($(this).find('input,textarea').first());
            });
        }
        init();


        return this;
    };

    $(function () {
        $('.float-label-control').floatLabels();
    });
})(jQuery);


window.onload = function() {
   // function AgregarLineaDeTexto() {
        $(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')  // Agrego nueva linea antes
    $.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
        };
   $('.onoffswitch-checkbox').on('click',function () {
    var id= $(this).attr('id')
    //var status = $('[data-status="'+id+'"]').get();
    //alert(status);
    if($('#'+id).hasAttr('checked')) {
        this.setAttribute("checked", ""); // For IE
        this.removeAttribute("checked"); // For other browsers
        this.checked = false;
        $('#'+id).attr( 'value','2');
    } else {
        this.setAttribute("checked", "checked");
        this.checked = true;
        $('#'+id).attr( 'value','1');
    }
});

}
/*(function ($) {
   // function AgregarLineaDeTexto() {
        $(".onoffswitch .form-group label").append('<div class="onoffswitch-label" for="active-employee"><span class="onoffswitch-inner active"></span><span class="onoffswitch-switch"></span></div>')  // Agrego nueva linea antes
        $.fn.hasAttr = function(name) {  
         return this.attr(name) !== undefined;
     };
     })(jQuery);
*/
    