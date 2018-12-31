<?php



function modal($id, $header, $body, $footer)
{
	return '
	<div id="'.$id.'" class="modal">
      <div class="modal-content">
        <div class="modal-header">
			<span class="modal-close" id="modal-close-'.$id.'">
				&times;
			</span>
			<h2>
				'.$header.'
			</h2>
        </div>
        <div class="modal-body">
			'.$body.'
        </div>
        <div class="modal-footer">
        	'.$footer.'
        </div>
      </div>
    </div>';
}

function modal_button(
	$id, 
	$button_text, 
	$button_class,
	$button_icon,
	$modal_title,
	$modal_body,
	$modal_footer
){
      return button(
        $id      = 'modal_'.$id.'-show', 
        $text    = $button_text, 
        $class   = $button_class, 
        $onclick = 'showModal(this.id)',
        $icon    = iconDespatch($button_icon)
      ) . modal(
        $id     = 'modal_'.$id,
        $header = $modal_title,
        $body   = $modal_body,
        $footer = $modal_footer
      );
    
}

?>