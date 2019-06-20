<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model {

    function Interaksi($data) {
        $exec = $this->db->select(' count( lap_rencana.nopen) as totrencana,( select count( lap_interaksi.id ) from lap_interaksi where lap_interaksi.nik = ' . $data[0]->nik . ' and month ( lap_interaksi.syscreatedate ) = month ( curdate( ) ) and year ( lap_interaksi.syscreatedate ) = year ( curdate( ) ) ) as totinteraksi, ( select count( lap_interaksi.id ) from lap_interaksi where lap_interaksi.nik = ' . $data[0]->nik . ' and month ( lap_interaksi.syscreatedate ) = month ( curdate( ) ) and year ( lap_interaksi.syscreatedate ) = year ( curdate( ) ) ) as tothp, ( select count( lap_interaksi.id ) from lap_interaksi where lap_interaksi.nik = ' . $data[0]->nik . ' and lap_interaksi.nom_tb > 1 and month ( lap_interaksi.syscreatedate ) = month ( curdate( ) ) and year ( lap_interaksi.syscreatedate ) = year ( curdate( ) ) ) as totcair, ( select format( sum( lap_interaksi.hp_nominal ), 0 ) from lap_interaksi where lap_interaksi.nik = ' . $data[0]->nik . ' and month ( lap_interaksi.syscreatedate ) = month ( curdate( ) ) and year ( lap_interaksi.syscreatedate ) = year ( curdate( ) ) ) as nomhp, ( select format( sum( lap_interaksi.nom_tb ), 0 ) from lap_interaksi where lap_interaksi.nik = ' . $data[0]->nik . ' and month ( lap_interaksi.syscreatedate ) = month ( curdate( ) ) and year ( lap_interaksi.syscreatedate ) = year ( curdate( ) ) ) as nomcair')
                ->from('lap_rencana')
                ->where('lap_rencana.nik', $data[0]->nik, FALSE)
                ->where('MONTH( lap_rencana.syscreatedate )', '= MONTH ( CURDATE( ) ) ', FALSE)
                ->where('YEAR( lap_rencana.syscreatedate )', '= YEAR ( CURDATE( ) );', FALSE)
                ->get()
                ->result();
        return $exec;
    }

    function Chart($nik) {
        $exec = $this->db->select('lap_interaksi.nik, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "01" and year(syscreatedate) = ' . date('Y') . ') as jan, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "02" and year(syscreatedate) = ' . date('Y') . ') as feb, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "03" and year(syscreatedate) = ' . date('Y') . ') as mar, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "04" and year(syscreatedate) = ' . date('Y') . ') as apr, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "05" and year(syscreatedate) = ' . date('Y') . ') as mei, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "06" and year(syscreatedate) = ' . date('Y') . ') as jun, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "07" and year(syscreatedate) = ' . date('Y') . ') as jul, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "08" and year(syscreatedate) = ' . date('Y') . ') as ags, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "09" and year(syscreatedate) = ' . date('Y') . ') as sep, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "10" and year(syscreatedate) = ' . date('Y') . ') as okt, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "11" and year(syscreatedate) = ' . date('Y') . ') as nov, ( select count( nom_tb ) from lap_interaksi where nom_tb > 1 and nik = ' . $nik[0]->nik . ' and month(syscreatedate) = "12" and year(syscreatedate) = ' . date('Y') . ') as des ')
                ->from('lap_interaksi')
                ->where('lap_interaksi.nik', $nik[0]->nik)
                ->group_by('lap_interaksi.nik')
                ->get()
                ->result();
        return $exec;
    }

}
