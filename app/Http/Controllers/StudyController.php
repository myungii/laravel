<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\board;
use App\Models\board_file;

class StudyController extends Controller
{

    	//main index
	public function index() {

        $board      = new board();
        $boardList  = $board->retrieve();

		return view('lists', [
                                //'boards'=> board::all()
                                'boards'    => $boardList,
                                'total'     => $board->total()
                             ]
                    );

	}

    	//select one
	public function load() {

        $board      = new board();
        $file       = new board_file();

        $loadData   = $board->loadData( $_GET['id'], 'load' );
		return view('view', [ 'load'         => $loadData,
                              'load_file'    => $file->loadData( $loadData->fileid )
                            ]);
	}

    	//prewrite or preupdate
	public function preEdit() {
		$board      = new board();
        $file       = new board_file();

        $mode = isset($_GET['idx']) ? 'edit' : 'write';

        //수정
        if( $mode == 'edit' ) {
            $preedit = $board->loadData( $_GET['id'], $mode );
            return view('edit', ['load'         => $preedit,
                                 'load_file'    => $file->loadData( $preedit->fileid )
                                ] );

        } else { //저장
            return view('edit');
        }

	}

    	//write or update
	public function editSave() {

        $board      = new board();

        if( !empty( $_POST['param'] ) ) {

            if( $_POST['id'] ) { //수정
                if( $board->modify( $_POST['param'], $_POST['id'] ) == TRUE ) {

                    $this->_displayJson('1');
                    exit;
                }

            } else { //저장
                if( $board->write( $_POST['param'] ) !== null ) {
                    //파일 업로드 후 데이터 insert
                    //$this->_fileUpload( $board->write( $_POST['param'] ) );
                    $this->_displayJson('1');
                    exit;
                }
            }
        }
        $this->_displayJson('0');
	}

    private function _fileUpload($boardId) {

        $file       = new board_file();

        $param  = array();



        //파일 업로드
        if( $file->upload($param) == TRUE ) {

            return TRUE;
        }

        return FALSE;
    }

    	//delete
	public function remove() {
		$board = new board();

        if( $board->remove( $_GET['id'] ) == TRUE ) {
            $this->_displayJson('1');
            exit;
        }
        $this->_displayJson('0');
	}

    //ajax response json
    private function _displayJson($is_valid) {
        $json               = null;
        $json['is_valid']   = $is_valid;

        echo json_encode($json);
    }


}
