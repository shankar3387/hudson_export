<script>
    function update_status()
             {  var status = '0';
                 $.ajax({
                        type:'POST',
                        url:'<?php echo base_url("Setting/updatestatus"); ?>',
                        data:{'status':status},
                        success:function(result){
        				}
                    });/* ajax call end*/
             }
    function getData1(id){
        var url = $("#base_url_vale").val();
                 $.ajax({
                        type:'POST',
                        url:'<?php echo base_url("Backend/AdminLoginController/getdata"); ?>',
                        data:{'id':id},
                        success:function(result){
                            var obj = JSON.parse(result);
                            $("#name1").val(obj.fullname);
                            $("#mobile1").val(obj.mobile);
                            $("#email1").val(obj.email);
                            var img = url+obj.img;
                            $("img").attr("src", img);
        				}
                    });/* ajax call end*/
            }
</script>