<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class board_file extends Model
{
    use HasFactory;

    protected $table = "board_files";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'audit_trail'
    ];

    public function __construct()
    {
        parent::__construct();

        $this->file = DB::table('board_files');
    }

    /**
     * loadData
     * @title 파일 조회
     * @param  mixed $id
     * @return row
     */
    public function loadData($id)
    {
        return $this->file->find($id);
    }

    /**
     * upload
     * @title 파일 등록
     * @param  mixed $param
     * @return bool
     */
    public function upload($param) {
        if( $this->file->add($param) == TRUE ) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * remove
     * @title 파일 삭제
     * @param  mixed $id
     * @return bool
     */
    public function remove($id) {
        if( $this->file->where('id', $id)->delete() == TRUE ) {
            return TRUE;
        }
        return FALSE;
    }


}
