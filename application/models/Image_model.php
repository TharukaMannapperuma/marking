<?php

class Image_model extends CI_Model
{

    function upload()
    {
        if (isset($_POST["image"])) {
            $data = $_POST["image"];

            $this->load->model('Database_model');
            $getData = $this->Database_model->getData();

            if ($getData) {
                $image_array_1 = explode(";", $data);
                $image_array_2 = explode(",", $image_array_1[1]);
                $data = base64_decode($image_array_2[1]);

                $imageName = "profileimages/" . $getData->username . '.png';

                $updateStat = $this->Database_model->updateImageUrl($imageName);
                if ($updateStat) {
                    file_put_contents($imageName, $data);
                    return TRUE;
                } else {
                    return FALSE;
                }
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
