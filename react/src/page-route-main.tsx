import ManageSeatClasses from './components/pages/seat-classes/ManageSeatClasses.tsx';
import CreateSeatClasses from './components/pages/seat-classes/CreateSeatClasses.tsx';
import EditSeatClasses from './components/pages/seat-classes/EditSeatClasses.tsx';
import DetailsSeatClasses from './components/pages/seat-classes/DetailsSeatClasses.tsx';

import ManageRoles from './components/pages/roles/ManageRoles.tsx';
import CreateRoles from './components/pages/roles/CreateRoles.tsx';
import EditRoles from './components/pages/roles/EditRoles.tsx';
import DetailsRoles from './components/pages/roles/DetailsRoles.tsx';

import ManagePayments from './components/pages/payments/ManagePayments.tsx';
import CreatePayments from './components/pages/payments/CreatePayments.tsx';
import EditPayments from './components/pages/payments/EditPayments.tsx';
import DetailsPayments from './components/pages/payments/DetailsPayments.tsx';

import ManagePaymentStatus from './components/pages/payment-status/ManagePaymentStatus.tsx';
import CreatePaymentStatus from './components/pages/payment-status/CreatePaymentStatus.tsx';
import EditPaymentStatus from './components/pages/payment-status/EditPaymentStatus.tsx';
import DetailsPaymentStatus from './components/pages/payment-status/DetailsPaymentStatus.tsx';

import ManagePaymentMethods from './components/pages/payment-methods/ManagePaymentMethods.tsx';
import CreatePaymentMethods from './components/pages/payment-methods/CreatePaymentMethods.tsx';
import EditPaymentMethods from './components/pages/payment-methods/EditPaymentMethods.tsx';
import DetailsPaymentMethods from './components/pages/payment-methods/DetailsPaymentMethods.tsx';

import ManagePassengers from './components/pages/passengers/ManagePassengers.tsx';
import CreatePassengers from './components/pages/passengers/CreatePassengers.tsx';
import EditPassengers from './components/pages/passengers/EditPassengers.tsx';
import DetailsPassengers from './components/pages/passengers/DetailsPassengers.tsx';

import ManageFlights from './components/pages/flights/ManageFlights.tsx';
import CreateFlights from './components/pages/flights/CreateFlights.tsx';
import EditFlights from './components/pages/flights/EditFlights.tsx';
import DetailsFlights from './components/pages/flights/DetailsFlights.tsx';

import ManageFlightTypes from './components/pages/flight-types/ManageFlightTypes.tsx';
import CreateFlightTypes from './components/pages/flight-types/CreateFlightTypes.tsx';
import EditFlightTypes from './components/pages/flight-types/EditFlightTypes.tsx';
import DetailsFlightTypes from './components/pages/flight-types/DetailsFlightTypes.tsx';

import ManageBookings from './components/pages/bookings/ManageBookings.tsx';
import CreateBookings from './components/pages/bookings/CreateBookings.tsx';
import EditBookings from './components/pages/bookings/EditBookings.tsx';
import DetailsBookings from './components/pages/bookings/DetailsBookings.tsx';

import ManageBookingTypes from './components/pages/booking-types/ManageBookingTypes.tsx';
import CreateBookingTypes from './components/pages/booking-types/CreateBookingTypes.tsx';
import EditBookingTypes from './components/pages/booking-types/EditBookingTypes.tsx';
import DetailsBookingTypes from './components/pages/booking-types/DetailsBookingTypes.tsx';

import ManageBookingStatus from './components/pages/booking-status/ManageBookingStatus.tsx';
import CreateBookingStatus from './components/pages/booking-status/CreateBookingStatus.tsx';
import EditBookingStatus from './components/pages/booking-status/EditBookingStatus.tsx';
import DetailsBookingStatus from './components/pages/booking-status/DetailsBookingStatus.tsx';

import ManageBookingFlights from './components/pages/booking-flights/ManageBookingFlights.tsx';
import CreateBookingFlights from './components/pages/booking-flights/CreateBookingFlights.tsx';
import EditBookingFlights from './components/pages/booking-flights/EditBookingFlights.tsx';
import DetailsBookingFlights from './components/pages/booking-flights/DetailsBookingFlights.tsx';

import ManageAirports from './components/pages/airports/ManageAirports.tsx';
import CreateAirports from './components/pages/airports/CreateAirports.tsx';
import EditAirports from './components/pages/airports/EditAirports.tsx';
import DetailsAirports from './components/pages/airports/DetailsAirports.tsx';

import ManageAirlines from './components/pages/airlines/ManageAirlines.tsx';
import CreateAirlines from './components/pages/airlines/CreateAirlines.tsx';
import EditAirlines from './components/pages/airlines/EditAirlines.tsx';
import DetailsAirlines from './components/pages/airlines/DetailsAirlines.tsx';

import ManageUsers from './components/pages/users/ManageUsers.tsx';
import CreateUsers from './components/pages/users/CreateUsers.tsx';
import EditUsers from './components/pages/users/EditUsers.tsx';
import DetailsUsers from './components/pages/users/DetailsUsers.tsx';

import ManageOrderStatus from './components/pages/order-status/ManageOrderStatus.tsx';
import CreateOrderStatus from './components/pages/order-status/CreateOrderStatus.tsx';
import EditOrderStatus from './components/pages/order-status/EditOrderStatus.tsx';
import DetailsOrderStatus from './components/pages/order-status/DetailsOrderStatus.tsx';

import ManageCustomers from './components/pages/customers/ManageCustomers.tsx';
import CreateCustomers from './components/pages/customers/CreateCustomers.tsx';
import EditCustomers from './components/pages/customers/EditCustomers.tsx';
import DetailsCustomers from './components/pages/customers/DetailsCustomers.tsx';



// Customers Routes
  {path: '/customers', element: <ManageCustomers/>},
  {path: '/create-customer', element: <CreateCustomers/>},
  {path: '/customer/edit/:id', element: <EditCustomers/>},
  {path: '/customer/details/:id', element: <DetailsCustomers/>},


// OrderStatus Routes
  {path: '/order-status', element: <ManageOrderStatus/>},
  {path: '/create-order-statu', element: <CreateOrderStatus/>},
  {path: '/order-statu/edit/:id', element: <EditOrderStatus/>},
  {path: '/order-statu/details/:id', element: <DetailsOrderStatus/>},


// Users Routes
  {path: '/users', element: <ManageUsers/>},
  {path: '/create-user', element: <CreateUsers/>},
  {path: '/user/edit/:id', element: <EditUsers/>},
  {path: '/user/details/:id', element: <DetailsUsers/>},


// Airlines Routes
  {path: '/airlines', element: <ManageAirlines/>},
  {path: '/create-airline', element: <CreateAirlines/>},
  {path: '/airline/edit/:id', element: <EditAirlines/>},
  {path: '/airline/details/:id', element: <DetailsAirlines/>},


// Airports Routes
  {path: '/airports', element: <ManageAirports/>},
  {path: '/create-airport', element: <CreateAirports/>},
  {path: '/airport/edit/:id', element: <EditAirports/>},
  {path: '/airport/details/:id', element: <DetailsAirports/>},


// BookingFlights Routes
  {path: '/booking-flights', element: <ManageBookingFlights/>},
  {path: '/create-booking-flight', element: <CreateBookingFlights/>},
  {path: '/booking-flight/edit/:id', element: <EditBookingFlights/>},
  {path: '/booking-flight/details/:id', element: <DetailsBookingFlights/>},


// BookingStatus Routes
  {path: '/booking-status', element: <ManageBookingStatus/>},
  {path: '/create-booking-statu', element: <CreateBookingStatus/>},
  {path: '/booking-statu/edit/:id', element: <EditBookingStatus/>},
  {path: '/booking-statu/details/:id', element: <DetailsBookingStatus/>},


// BookingTypes Routes
  {path: '/booking-types', element: <ManageBookingTypes/>},
  {path: '/create-booking-type', element: <CreateBookingTypes/>},
  {path: '/booking-type/edit/:id', element: <EditBookingTypes/>},
  {path: '/booking-type/details/:id', element: <DetailsBookingTypes/>},


// Bookings Routes
  {path: '/bookings', element: <ManageBookings/>},
  {path: '/create-booking', element: <CreateBookings/>},
  {path: '/booking/edit/:id', element: <EditBookings/>},
  {path: '/booking/details/:id', element: <DetailsBookings/>},


// FlightTypes Routes
  {path: '/flight-types', element: <ManageFlightTypes/>},
  {path: '/create-flight-type', element: <CreateFlightTypes/>},
  {path: '/flight-type/edit/:id', element: <EditFlightTypes/>},
  {path: '/flight-type/details/:id', element: <DetailsFlightTypes/>},


// Flights Routes
  {path: '/flights', element: <ManageFlights/>},
  {path: '/create-flight', element: <CreateFlights/>},
  {path: '/flight/edit/:id', element: <EditFlights/>},
  {path: '/flight/details/:id', element: <DetailsFlights/>},


// Passengers Routes
  {path: '/passengers', element: <ManagePassengers/>},
  {path: '/create-passenger', element: <CreatePassengers/>},
  {path: '/passenger/edit/:id', element: <EditPassengers/>},
  {path: '/passenger/details/:id', element: <DetailsPassengers/>},


// PaymentMethods Routes
  {path: '/payment-methods', element: <ManagePaymentMethods/>},
  {path: '/create-payment-method', element: <CreatePaymentMethods/>},
  {path: '/payment-method/edit/:id', element: <EditPaymentMethods/>},
  {path: '/payment-method/details/:id', element: <DetailsPaymentMethods/>},


// PaymentStatus Routes
  {path: '/payment-status', element: <ManagePaymentStatus/>},
  {path: '/create-payment-statu', element: <CreatePaymentStatus/>},
  {path: '/payment-statu/edit/:id', element: <EditPaymentStatus/>},
  {path: '/payment-statu/details/:id', element: <DetailsPaymentStatus/>},


// Payments Routes
  {path: '/payments', element: <ManagePayments/>},
  {path: '/create-payment', element: <CreatePayments/>},
  {path: '/payment/edit/:id', element: <EditPayments/>},
  {path: '/payment/details/:id', element: <DetailsPayments/>},


// Roles Routes
  {path: '/roles', element: <ManageRoles/>},
  {path: '/create-role', element: <CreateRoles/>},
  {path: '/role/edit/:id', element: <EditRoles/>},
  {path: '/role/details/:id', element: <DetailsRoles/>},


// SeatClasses Routes
  {path: '/seat-classes', element: <ManageSeatClasses/>},
  {path: '/create-seat-class', element: <CreateSeatClasses/>},
  {path: '/seat-class/edit/:id', element: <EditSeatClasses/>},
  {path: '/seat-class/details/:id', element: <DetailsSeatClasses/>},
