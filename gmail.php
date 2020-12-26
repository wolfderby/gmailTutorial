<?php

class Gmail{

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function readLabels()
    {
        $service = new Google_Service_Gmail($this->client);

        // Print the labels in the user's account.
        $user = 'me';
        $results = $service->users_labels->listUsersLabels($user);

        $the_html = "";
        if (count($results->getLabels()) == 0) {
            $the_html .= "<p>No labels found.</p>";
        } else {
            $the_html .= "<p>Labels:</p>";
            foreach ($results->getLabels() as $label) {
                $the_html .= "<p>".$label->getName()."</p>";
            }
        }
        return $the_html;
    }

}





