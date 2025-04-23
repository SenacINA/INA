<?php    

class GeralController extends RenderView {
    public function sobreNos() {
        $this->loadView('geral/sobre_nos', []);
    }
}
