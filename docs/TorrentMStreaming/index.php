ines (3 sloc)  94 Bytes
<?php
include "util/RequestRouter.php";

echo json_encode((new RequestRouter)->route());