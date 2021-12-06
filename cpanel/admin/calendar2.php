<?php
add_filter( 'tribe_events_ical_single_event_links', function( $links ){

  $links = '<div class="tribe-events-cal-links">';
  $links .= '<a class="tribe-events-gcal tribe-events-button" href="' . Tribe__Events__Main::instance()->esc_gcal_url( tribe_get_gcal_link() ) . '" title="' . esc_attr__( 'Add to Google Calendar', 'the-events-calendar' ) . '">+ ' . esc_html__( 'Google Calendar', 'the-events-calendar' ) . '</a>';
  $links .= '<a class="tribe-events-gcal tribe-events-button" href="' . esc_url( tribe_get_single_ical_link() ) . '" title="' . esc_attr__( 'Download .ics file', 'the-events-calendar' ) . '" >+ ' . esc_html__( 'iCal Export', 'the-events-calendar' ) . '</a>';
  $links .= '<a class="tribe-events-ical tribe-events-button" href="' . esc_url( tribe_get_single_ical_link() ) . '" title="' . esc_attr__( 'Download Exchange file', 'the-events-calendar' ) . '" >+ ' . esc_html__( 'Exchange Export', 'the-events-calendar' ) . '</a>';
  $links .= '</div><!-- .tribe-events-cal-links -->';

  return $links;
}, 99 );

?>