<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_Salary extends CI_Model {

    function MReportMonthly() {
        if (date("F") == "JANUARY") {
            $between = date("Y", strtotime("-1 year")) . '-12-25';
            $between1 = date("Y") . '-01-24';
        } else {
            $between = date("Y") . '-' . date("m", strtotime("-1 month")) . '-25';
            $between1 = date("Y") . '-' . date("m") . '-24';
        }
        $exec = $this->db->query('select norut.norut,mst_karyawan.nama_karyawan as uname,lokasi_kerja,mst_karyawan.penpok,t_gaji.limit1 ,t_gaji.persen1,t_gaji.limit2,t_gaji.persen2,t_gaji.limit3,t_gaji.persen3, ( select sum( nom_tb) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as plaf,( select count( *) from lap_rencana where usr_adm.nik = lap_rencana.nik and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as ri, ( select count( * ) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as hi, ( select count( hp_status ) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.hp_status = "y" and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as hp from norut left join usr_adm on norut.nik = usr_adm.nik left join mst_karyawan on norut.nik = mst_karyawan.nik left join lap_interaksi on norut.nik = lap_interaksi.nik left join lap_rencana on norut.nik = lap_rencana.nik left join t_gaji on norut.nik = t_gaji.nik  group by norut.nik order by norut.norut asc');
        return $exec;
    }

    function ReportMonthly() {
        if (date("F") == "JANUARY") {
            $between = date("Y", strtotime("-1 year")) . '-12-25';
            $between1 = date("Y") . '-01-24';
        } else {
            $between = date("Y") . '-' . date("m", strtotime("-1 month")) . '-25';
            $between1 = date("Y") . '-' . date("m") . '-24';
        }
        $exec = $this->db->query('select norut.norut,mst_karyawan.nama_karyawan as uname,lokasi_kerja,mst_karyawan.penpok,t_gaji.limit1 ,t_gaji.persen1,t_gaji.limit2,t_gaji.persen2,t_gaji.limit3,t_gaji.persen3,( select sum( nom_tb) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as plaf,( select count( *) from lap_rencana where usr_adm.nik = lap_rencana.nik and syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as ri, ( select count( * ) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as hi, ( select count( hp_status ) from lap_interaksi where usr_adm.nik = lap_interaksi.nik and lap_interaksi.hp_status = "y" and lap_interaksi.syscreatedate between "' . date("y") . '-' . date("m", strtotime("- 1 month ")) . '-25" and "' . date("y") . '-' . date("m") . '-24" ) as hp from norut left join usr_adm on norut.nik = usr_adm.nik left join mst_karyawan on norut.nik = mst_karyawan.nik left join lap_interaksi on norut.nik = lap_interaksi.nik left join lap_rencana on norut.nik = lap_rencana.nik left join t_gaji on norut.nik = t_gaji.nik  group by norut.nik order by norut.norut asc');
        return $exec;
    }

}
