<?php
      $worker->setFailureHooks($this->_failureHooks);
      $worker->setInspector($this->_inspector);
      $worker->start();
    }
  }
}