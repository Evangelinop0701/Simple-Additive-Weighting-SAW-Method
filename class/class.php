<?php



class database
{
    protected $servername = 'localhost';
    protected $hostname = 'root';
    protected $password = '';
    protected $dbname = 'sad_db';
    protected $conn;

    public function __construct()
    {
        if (!isset($this->conn)) {
            $this->conn = new mysqli($this->servername, $this->hostname, $this->password, $this->dbname) ;
        }

        if(!$this->conn) {
            echo 'Koneksaun Database La Susessu';
        }

        return $this->conn;

    }
}

class CRUD extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    //To read data
    public function read_data($table, $id, $id_value)
    {
        $query = "SELECT * FROM $table";

        if ($id != null) {
            $query .= " WHERE $id='" . $id_value . "'";
        }


        $result = $this->conn->query($query);

        if(!$result) {
            return 'Akontese Erru iha Query!';
        }

        $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }


    //To update data
    public function update_data($table, $data, $id, $id_value)
    {
        $query = "UPDATE $table SET ";
        $query .= implode(',', $data);
        $query .= "WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To delete data
    public function delete_data($table, $id, $id_value)
    {
        $query = "DELETE FROM $table WHERE $id='" . $id_value . "'";
        $result = $this->conn->query($query);
        if($result) {
            return true;
        } else {
            return false;
        }
    }

    //To insert data
    public function insert_data($table_name, $data)
    {
        $string = "INSERT INTO " . $table_name . "(";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";

        if(mysqli_query($this->conn, $string)) {
            return true;
        } else {
            echo mysqli_error($this->conn);
        }
    }


    //To get last id
    public function get_last_id($id, $table)
    {
        $query = "SELECT $id FROM $table ORDER BY $id DESC LIMIT 1";
        $result = $this->conn->query($query);
        $data = mysqli_fetch_array($result);

        return $data['id'];
    }


}


class rezultado extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    public function logika_kasu()
    {

        $sql = "SELECT p.naran FROM t_detalho_krt rk, t_alternativu a, t_pessoa p, t_kasu k WHERE rk.id_alt=a.id_alt AND a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function logika_kriteria()
    {

        $sql = "SELECT rk.id_regis FROM t_detalho_krt rk, t_registu_krt r, t_kriteiro k WHERE rk.id_regis=r.id_reagis AND r.id_kriteiro=k.id_kriteiro AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function rezultado($id)
    {

        $sql = "SELECT * FROM t_detalho_krt k, t_alternativu a, t_registu_krt r, t_pessoa p, t_valor_pre pre WHERE k.id_alt=a.id_alt AND k.id_regis=r.id_reagis AND a.id_pessoa=p.id_pessoa AND k.id_alt AND r.id_valor_prefe=pre.id_valor AND k.id_alt='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function valores_benefit($id)
    {

        $sql = "SELECT MAX(k.valors) as valor_max, MIN(k.valors) as valor_min FROM t_detalho_krt k, t_kasu ks, t_kriteiro kr, t_alternativu a, t_registu_krt r, t_pessoa p WHERE k.id_alt=a.id_alt AND k.id_regis=r.id_reagis AND a.id_pessoa=p.id_pessoa AND k.id_regis='$id' AND p.id_kasu=ks.id_kasu AND ks.status='Y' AND r.id_kriteiro=kr.id_kriteiro AND kr.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    // validate

    public function validate($id)
    {

        $sql = "SELECT * FROM t_ranking WHERE id_alt='$id'";
        $query = $this->conn->query($sql);
        $row = $query->num_rows;

        return $row;

    }
    // dfdas

    public function detallu_krt($id)
    {

        $sql = "SELECT * FROM t_detalho_krt k, t_kasu ks, t_kriteiro kr, t_alternativu a, t_registu_krt r, t_pessoa p WHERE k.id_alt=a.id_alt AND k.id_regis=r.id_reagis AND a.id_pessoa=p.id_pessoa AND k.id_regis='$id' AND p.id_kasu=ks.id_kasu AND ks.status='Y' AND r.id_kriteiro=kr.id_kriteiro AND kr.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function header_kri()
    {

        $sql = "SELECT * FROM t_registu_krt k, t_kriteiro kri WHERE k.id_kriteiro=kri.id_kriteiro AND kri.status ='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }


    public function alt()
    {

        $sql = "SELECT * FROM t_alternativu a, t_pessoa p, t_kasu k WHERE a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }



}



class kasu extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function read_kasu()
    {
        $sql = "SELECT * FROM t_kasu";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function kasu_form($id)
    {
        $sql = "SELECT * FROM t_kasu WHERE id_kasu='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }


    public function update_all($id)
    {
        $sql = "UPDATE t_kasu SET status='Y' WHERE id_kasu='$id'";
        $query = $this->conn->query($sql);

        $sql = "UPDATE t_kasu SET status='' WHERE id_kasu !='$id'";
        $query = $this->conn->query($sql);

    }
}

class pessoa extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function pessoa_pessoa($id)
    {
        $sql = "SELECT * FROM t_pessoa p, t_kasu k WHERE p.id_kasu=k.id_kasu AND p.id_kasu='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function dados_pessoa()
    {
        $sql = "SELECT * FROM t_pessoa p, t_kasu k WHERE p.id_kasu=k.id_kasu AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function pessoa_from($id)
    {
        $sql = "SELECT * FROM t_pessoa p, t_kasu k WHERE p.id_kasu=k.id_kasu AND p.id_pessoa='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
}


class Kriteria extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function kriteria()
    {
        $sql = "SELECT * FROM t_kriteiro";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function krt_from($id)
    {
        $sql = "SELECT * FROM t_kriteiro WHERE id_kriteiro='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function krt_yes()
    {
        $sql = "SELECT * FROM t_kriteiro WHERE status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }

    public function update_all_krt($id)
    {
        $sql = "UPDATE t_kriteiro SET status='Y' WHERE id_kriteiro='$id'";
        $query = $this->conn->query($sql);

        $sql = "UPDATE t_kriteiro SET status='' WHERE id_kriteiro !='$id'";
        $query = $this->conn->query($sql);

    }
}
class registu_krt extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function regis_kriteria()
    {
        $sql = "SELECT * FROM t_registu_krt rk, t_kriteiro k, t_valor_pre v WHERE rk.id_kriteiro=k.id_kriteiro AND rk.id_valor_prefe=v.id_valor AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function regis_form($id)
    {
        $sql = "SELECT * FROM t_registu_krt rk, t_kriteiro k, t_valor_pre v WHERE rk.id_kriteiro=k.id_kriteiro AND rk.id_valor_prefe=v.id_valor AND k.status='Y' AND rk.id_reagis='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
}

class valor_preferensia extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function valor_preferensia()
    {
        $sql = "SELECT * FROM t_valor_pre v, t_preferensia p WHERE v.id_preferensia=p.id_preferensia AND p.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
}

class alternativu extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function alternativu()
    {
        $sql = "SELECT * FROM t_alternativu a, t_pessoa p, t_kasu k WHERE a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
    public function alt_form($id)
    {
        $sql = "SELECT * FROM t_alternativu a, t_pessoa p, t_kasu k WHERE a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND a.id_alt='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;

        }
    }
}

class detalho_alt extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function detallo_alt($id)
    {

        $sql = "SELECT * FROM t_detalho_krt kr, t_alternativu a, t_pessoa p, t_kasu k, t_registu_krt rs, t_kriteiro kri WHERE kr.id_alt=a.id_alt AND a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y' AND kr.id_regis=rs.id_reagis AND rs.id_kriteiro=kri.id_kriteiro AND a.id_alt='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function detallo_form($id)
    {

        $sql = "SELECT * FROM t_detalho_krt k, t_registu_krt rs, t_alternativu a WHERE k.id_regis=rs.id_reagis AND k.id_alt=a.id_alt AND k.id_detalho='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function detalho_kandidatu($id)
    {

        $sql = "SELECT p.id_pessoa, p.naran FROM t_alternativu a, t_pessoa p WHERE a.id_pessoa=p.id_pessoa AND p.id_pessoa='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
}

class preferensia extends database
{
    public function __construct()
    {
        parent::__construct();
    }


    public function preferensia()
    {
        $sql = "SELECT * FROM t_preferensia";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function pre_form($id)
    {
        $sql = "SELECT * FROM t_preferensia WHERE id_preferensia='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function pre_status()
    {
        $sql = "SELECT * FROM t_preferensia WHERE status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    public function update_status($id)
    {
        $sql = "UPDATE t_preferensia SET status='Y' WHERE id_preferensia ='$id'";
        $this->conn->query($sql);
        $sql = "UPDATE t_preferensia SET status='' WHERE id_preferensia !='$id'";
        $this->conn->query($sql);


    }

    public function Valor_preferensia()
    {
        $sql = "SELECT * FROM t_valor_pre vp, t_preferensia p WHERE vp.id_preferensia=p.id_preferensia AND p.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }
    public function select_form_valor($id)
    {
        $sql = "SELECT * FROM t_valor_pre vp, t_preferensia p WHERE vp.id_preferensia=p.id_preferensia AND vp.id_valor='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

}

class Ranking extends database
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert_ranking($id_regis, $rank)
    {
        $this->conn->query("INSERT INTO t_ranking VALUES('','$id_regis','$rank')");
    }

    public function PrediksaunRanking()
    {

        $sql = "SELECT a.naran_alt, r.valor FROM t_ranking r, t_alternativu a, t_pessoa p, t_kasu k WHERE r.id_alt=a.id_alt AND a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y' ORDER BY r.valor DESC";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function valor_max()
    {

        $sql = "SELECT MAX(r.valor) as valor_max, MIN(r.valor) as valor_min FROM t_ranking r, t_alternativu a, t_pessoa p, t_kasu k WHERE r.id_alt=a.id_alt AND a.id_pessoa=p.id_pessoa AND p.id_kasu=k.id_kasu AND k.status='Y'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }

    public function delete_all()
    {
        $sql = "DELETE FROM t_ranking WHERE id_ranking !=00000000";
        $query = $this->conn->query($sql);

    }
    // Somatorio valor ranking

    public function insert_valor_soma($id_alt, $id_rs_kr, $valor_soma)
    {

        $sql = "INSERT INTO t_somatorio VALUES('','$id_alt','$id_rs_kr','$valor_soma')";
        $query = $this->conn->query($sql);

    }
    public function delete_soma()
    {
        $sql = "DELETE FROM t_somatorio WHERE id_soma !=00000";
        $query = $this->conn->query($sql);
    }

    public function soma_valor_alt($id_alt)
    {
        $sql = "SELECT SUM(valor_soma) as soma_valor FROM t_somatorio s, t_alternativu a WHERE s.id_alt=a.id_alt AND s.id_alt='$id_alt'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}
class subkriteria extends database
{
    public function __construct()
    {
        parent::__construct();
    }
    public function sub_kriteria($id)
    {
        $sql = "SELECT * FROM t_subkriteria sub, t_registu_krt rk, t_kriteiro k, t_valor_pre v WHERE sub.id_registu_krt=rk.id_reagis AND rk.id_kriteiro=k.id_kriteiro AND rk.id_valor_prefe=v.id_valor AND k.status='Y' AND sub.id_registu_krt='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function select_form($id)
    {
        $sql = "SELECT * FROM t_subkriteria sub, t_registu_krt rk, t_kriteiro k, t_valor_pre v WHERE sub.id_registu_krt=rk.id_reagis AND rk.id_kriteiro=k.id_kriteiro AND rk.id_valor_prefe=v.id_valor AND k.status='Y' AND sub.id_sub='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
    public function registu_krt($id)
    {
        $sql = "SELECT * FROM t_registu_krt  WHERE id_reagis='$id'";
        $query = $this->conn->query($sql);

        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }

    }
}