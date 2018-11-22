
$(document).ready(function(){
	$(".re_bt").click(function(e){
		e.preventDefault();
		var params = $("form").serialize();
				$.ajax({
					type: 'post',
					url: 'reply_db.php?=<?php echo $board["uid"]; ?>',
					data : params,
					dataType : 'html',
					success: function(data){
						$(".reply_view").html(data);
						$(".reply_content").val('');
					}
				});
			});

			$(".re_re_bt").click(function(e){
				e.preventDefault();
				var params = $("form").serialize();
						$.ajax({
							type: 'post',
							url: 're_reply_db.php?=<?php echo $board["uid"]; ?>',
							data : params,
							dataType : 'html',
							success: function(data){
								$(".reply_view").html(data);
								$(".re_reply_content").val('');
								$(".re_reply").hide();
							}
						});
					});

			// 댓글 수정 삭제
			$(".dat_edit_bt").click(function(){
					/* dat_edit_bt클래스 클릭시 동작(댓글 수정) */

						var obj = $(this).closest(".dap_lo").find(".dat_edit");
						obj.dialog({
							modal:true,
							width:650,
							height:200,
							title:"댓글 수정"});

					});

				$(".dat_delete_bt").click(function(){
					/* dat_delete_bt클래스 클릭시 동작(댓글 삭제) */
					var obj = $(this).closest(".dap_lo").find(".dat_delete");
					obj.dialog({
						modal:true,
						width:400,
						title:"댓글 삭제"});
					});

					$(".re_reply_bt").click(function(){
						/* 대댓글 */
						var obj = $(this).closest('.dap_lo').find(".re_reply");
						obj.dialog({
							modal:true,
							width:650,
							height:200,
							title:"답글 달기"});
						});
						$(".re_reply_bt").click(function(){
							/* 대댓글 */
							var obj = $(this).closest('.dap_lo_re').find(".re_reply");
							obj.dialog({
								modal:true,
								width:650,
								height:200,
								title:"답글 달기"});
							});

});
