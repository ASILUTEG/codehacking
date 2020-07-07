<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class sysUsercollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'yi' => $this->id,
            'yu' => $this->user_name,
            'yp' => $this->password,
            'yb' => $this->branch,
            'ye' => $this->esl_no,
            'yy' => $this->yearn,
            'yr' => $this->report_id,

        ];
    }
}
