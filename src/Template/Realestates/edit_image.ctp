<div class="container">
 
    
     
    <div class="row"> 
 
        <?php  if(isset($realestate->images)){ 
                foreach($realestate->images as $real): ?> 
                <div class="col-md-4">
                    <div class="box-real">
                    <div class="card-body">                    
                    <?php echo $this->Html->image('File/Image/'.$real['name'], ['alt' => 'CakePHP', 'class'=>'index_img']); ?>
                    <?php echo  $this->Form->postLink('<i class="far fa-trash-alt"></i>',
                    ['controller'=>'realestates','action' => 'deleteImage', $real->id], ['class' => 'btn btn-outline-danger  btn-xs','escape' => false,
                    'style'               =>'width: 44px; height: 38px ',
                        'confirm' => __('Are you sure you want to delete # {0}?', $real->id)]);?>
                    </div>
                    </div>
                </div>     
        <?php endforeach; 
        }?>
 </div> 
 <div class="row">
   

        <div class="col-md-6">
            <label for="validationCustomUsername"><?= __("Images") ?></label>
            
                    <div class="row ">
                      <div class="col-sm-12 ">
                      <?= $this->Form->create($realestate,['type' => 'file']) ?>
                        <div class="form-group inputDnD">
                          <label class="sr-only" for="inputFile">File Upload</label>
                          <?php echo $this->Form->control('images[]', ['type' => 'file', 'multiple' => 'true','class'=>'form-control-file text-primary font-weight-bold','onchange'=>'readUrl(this)','data-title'=>'Drag and drop a file',
                                            'required' => false, 'label' => false
                                    ]
                                    ); ?> </div>
                      </div>
                    </div>
        </div>
        

                    <?= $this->Form->unlockField('images');?>
                    <?= $this->Form->unlockField('images.name');?>
                    <?= $this->Form->unlockField('images.type');?>
                    <?= $this->Form->unlockField('images.tmp_name');?>
                    <?= $this->Form->unlockField('images.error');?>
                    <?= $this->Form->unlockField('images.size');?>
                    <div id="hidden">
                     
                     </div>
                     </div>
                     <?= $this->Form->button (__ ('Submit'), ["class" => "btn btn-primary"]) ?>
                    <?= $this->Form->end () ?>
</div>

<script>
function readUrl(input) {

if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
    var imgData = e.target.result;
    var imgName =new Array();
    var i=0;
    for (i = 0; i < input.files.length; i++) { 
        imgName[i]= input.files[i].name;
    }
    input.setAttribute("data-title", imgName);
   
  };
  reader.readAsDataURL(input.files[0]);
}
}
</script>
 