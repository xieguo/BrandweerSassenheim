<?php

namespace Base\Framework\Parser;

class P2000
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * List of supported cap codes
     *
     * @var array
     */
    private $capCodes = [1503560];

    /**
     * Parse the content and populate the $rows property
     *
     * @param int $pages
     */
    public function parse($pages = 1)
    {
        for ($page = 0; $page < $pages; $page++)
        {
            $content = $this->content($page);
            $rows = $this->rows($content);

            foreach ($rows as $key => $row)
            {
                if (!$this->valid($row))
                {
                    continue;
                }

                // The row contains a supported capcode
                if (!$parent = $this->parent($key, $rows))
                {
                    continue;
                }

                // Extract info
                list($date, $time) = $this->between($parent, '<td class="DT">', '</td>', true);

                $datetime = \DateTime::createFromFormat('d-m-y H:i:s', $date . ' ' . $time);
                $title = $this->between($parent, '<td class="Md">', '</td>');

                // Push
                $this->items[] = [
                    'created_at' => $datetime,
                    'title' => $title,
                ];
            }
        }
    }

    /**
     * Returns items when available
     *
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * Returns all the rows in the table
     *
     * @param string $content
     * @return array
     */
    private function rows($content)
    {
        $table = $this->between($content, '<table style="align:center">', '</table>');

        return $this->between($table, '<tr>', '</tr>', true);
    }

    /**
     * @param $key
     * @param array $rows
     * @return bool
     */
    private function parent($key, array $rows)
    {
        // Find all the parents and order them descending
        $parents = array_reverse(array_slice($rows, 0, $key));

        foreach ($parents as $parent)
        {
            // Bingo
            if (strstr($parent, 'class="Md"'))
            {
                return $parent;
            }
        }

        return false;
    }

    /**
     * Returns true when the row contains a supported capcode
     *
     * @param string $row
     * @return bool
     */
    private function valid($row)
    {
        foreach ($this->capCodes as $capCode)
        {
            if (strpos($row, (string) $capCode))
            {
                return true;
            }
        }

        return false;
    }

    /**
     * Returns the content between two tags
     *
     * @param string $content
     * @param string $start
     * @param string $end
     * @param bool $all
     * @return string|array
     */
    private function between($content, $start, $end, $all = false)
    {
        $pattern = "'" . $start . "(.*?)" . $end . "'si";

        if ($all)
        {
            preg_match_all($pattern, $content, $matches);

            return $matches[1];
        }

        preg_match($pattern, $content, $match);

        return $match[1];
    }

    /**
     * Download and returns the content
     *
     * @param int $page
     * @return string
     */
    private function content($page = 1)
    {
        return file_get_contents($this->endpoint() . '&Pagina=' . $page);
    }

    /**
     * @return string
     */
    private function endpoint()
    {
        return base64_decode(
            'aHR0cDovL3d3dy5wMjAwMC1vbmxpbmUubmV0L3AyMDAwLnBocD9CcmFuZHdlZXI9MSZIb2xsYW5kc01pZGRlbj0xJkF1dG9SZWZyZXNoPTYw'
        );
    }
}
