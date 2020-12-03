<?php
/**
 * Created by PhpStorm.
 * User: xavier
 * Date: 03/12/2020
 * Time: 0:01
 */
?>
<script type="text/javascript">
    var oPage={
        aData:{
        },
        init:function () {
            oPageGeneric.init();
        },
        initData:function(){
            var $divContent = $(".div-content");


        },
        showModal:function (sensor, pkAsignacion) {
            var $form = $("#formAsignacion");
            $form.find("input[name='pk']").val(pkAsignacion);
            $form.find(".div-nombre-sensor").html(sensor);
            $('#mAsignacion').modal('show');
        },
        delete:function (id) {
//            var $pk = $(obj).closest('tr').find("input[name='pk']");
            var $aData = {
                'id':id
            };
            oPageGeneric.delete("{{url('pregunta.destroy')}}", $aData)
        },

    };
    document.addEventListener("DOMContentLoaded", function(event) {
        console.log("131313");
    });
    $(document).ready(function(){
        console.log("asdfasdf");
        oPage.init();
    });
</script>

