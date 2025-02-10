<?php
class presentation {
    private $db;

    public function __construct(Db $db) {
        $this->db = $db->getConnection();
    }

    public function addPresentation($title, $date) {
        $query = "INSERT INTO presentations (presentation_title, presentation_date) VALUES (:title, :date)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':date', $date);
        return $stmt->execute();
    }
    

    public function getAllPresentations() {
        $query = "SELECT p.presentation_id, 
                         p.presentation_title, 
                         p.presentation_date, 
                         p.is_accepted,
                         GROUP_CONCAT(CONCAT(u.user_firstname, ' ', u.user_lastname) SEPARATOR '|') AS assigned_users
                  FROM presentations p
                  LEFT JOIN assigned_presentations ap ON p.presentation_id = ap.presentation_id
                  LEFT JOIN users u ON ap.user_id = u.user_id
                  GROUP BY p.presentation_id
                  ORDER BY p.presentation_date ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}