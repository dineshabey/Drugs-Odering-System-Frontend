<?php

//include_once (str_replace("\\", "/", __DIR__) . '/config/dbc.php');
include_once './config/dbc.php';

class setting {

    function prepareSelectQueryForJSON($query) {
        $data = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }

    function prepareSelectQueryForJSONSingleData($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }

    function prepareSelectQuaryForAllData($query) {
        $data = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error());
        MainConfig::closeDB();
        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function getNextAutoIncrementID($table) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error());
        MainConfig::closeDB();
        $row = mysql_fetch_array($result);
        return $nextId = $row['Auto_increment'];
    }

    function deleteQuery($query, $successMsg, $errorMsg) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query)or die(mysqli_error($link));
        MainConfig::closeDB();
        if (isset($save) && $save) {
            echo json_encode(array(array("msgType" => 1, "msg" => $successMsg)));
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => $errorMsg)));
        }
    }

    function getFirstKey($arr) {
        reset($arr);
        return key($arr);
    }

    function prepareAjaxSelectBox($array, $value_name, $data_name, $selectedValue = false, $error_msg = ' -- No Data Found -- ') {
        if (!empty($array)) {
            foreach ($array as $data) {
                if (isset($selectedValue) && $data[$value_name] == $selectedValue) {
                    echo '<option value="' . $data[$value_name] . '" selected>' . $data[$data_name] . '</option>';
                } else {
                    echo '<option value="' . $data[$value_name] . '">' . $data[$data_name] . '</option>';
                }
            }
        } else {
            echo '<option value="0">' . $error_msg . '</option>';
        }
    }

    function autoRedict($redirectPath, $time) {
        echo '<script type="text/javascript">
		window.setTimeout(function() {
		window.location.href = "' . $redirectPath . '";
		},' . $time . ')
             </script>';
    }

    function prepareSelectQuery($query) {
        $data = array();
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        MainConfig::closeDB();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    function prepareCommandQuery($query, $successMsg, $errorMsg) {
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query);
        if (isset($save) && $save) {
            echo '<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Success!</strong> ' . $successMsg . ' </div>';
        } else {
            echo '<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Error!</strong> ' . $errorMsg . ' </div>';
        }
    }

    function prepareCommandQuerySpecial($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query);
        MainConfig::closeDB();
        if (isset($save) && $save) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function prepareCommandQueryForAlertify($query, $successMsg, $errorMsg) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $save = mysqli_query($link, $query)or die(mysqli_error($link));
        MainConfig::closeDB();
        if (isset($save) && $save) {
            echo json_encode(array(array("msgType" => 1, "msg" => $successMsg)));
        } else {
            echo json_encode(array(array("msgType" => 2, "msg" => $errorMsg)));
        }
    }

    function prepareQueryCount($tableName) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName;
        $countData = $this->getSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function prepareRowQuntQuary($query) {
        MainConfig::connectDB();
        $link = MainConfig::conDB();
        $data = mysqli_query($link, $query);
        $count = mysqli_num_rows($link, $data);
        MainConfig::closeDB();
        return $count;
    }

    function prepareQueryCountByCondition($tableName, $colName, $colValue) {
        $count = 0;
        $query = "SELECT COUNT(*) as count FROM " . $tableName . " WHERE " . $colName . " = '" . $colValue . "'";
        $countData = $this->prepareSelectQuaryForAllData($query);
        return $countData[0]['count'];
    }

    function getCountByQuery($query) {
        $count = 0;
        MainConfig::connectDB();

        $link = MainConfig::conDB();
        $queryResult = mysqli_query($link, $query);
        $count = mysqli_num_rows($queryResult);
        MainConfig::closeDB();
        return $count;
    }

}
?>

