<nav>

    <a href="index.php?menu=1">Home</a> |

    <a href="index.php?menu=2">Vježbe</a> |

    <a href="index.php?menu=20">Galerija</a> |

    <a href="index.php?menu=3">O nama</a> |

    <a href="index.php?menu=4">Kontakt</a>

    <?php

    if(!isset($_SESSION['user'])) {

        echo ' |
        <a href="index.php?menu=5">Registracija</a> |

        <a href="index.php?menu=6">Prijava</a>';

    }
    else {

        echo ' |
        Pozdrav, ' . $_SESSION['user'] . ' |

        <a href="index.php?menu=8">Admin</a> |

        <a href="index.php?menu=7">Odjava</a>';
    }

    ?>

</nav>

<hr>