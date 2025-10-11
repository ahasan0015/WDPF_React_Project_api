export interface Flight {
  flightId: number,
  airlineId?: number,
  departureAirportId?: number,
  arrivalAirportId?: number,
  departureTime?: string,
  arrivalTime?: string,
  flightTypeId?: number,
}

const flightDefault: Flight = {
  flightId: 0,
  airlineId: 0,
  departureAirportId: 0,
  arrivalAirportId: 0,
  departureTime: "",
  arrivalTime: "",
  flightTypeId: 0,
};

export default flightDefault;
